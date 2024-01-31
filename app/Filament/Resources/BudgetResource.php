<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\Item;
use App\Models\Site;
use App\Models\User;
use Filament\Tables;
use App\Models\Budget;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Maintenance;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Enums\ActionsPosition;
use App\Filament\Resources\BudgetResource\Pages;
use Filament\Tables\Actions\Action as ActionTable;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Forms\Components\Actions\Action as ActionForm;

class BudgetResource extends Resource
{
    protected static ?string $model = Budget::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $activeNavigationIcon = 'heroicon-s-banknotes';
    protected static ?string $navigationGroup = 'Mandatory';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', '<>', 'Rejected')->count() > 5 ? 'danger' : 'primary';
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-panels::pages/budget.title');
    }

    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/budget.title');
    }

    public static function shouldRegisterNavigation(): bool
    {
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        if (Auth::user()->can('view-any Budget'))
            return true;
        else
            return false;
    }

    public static function form(Form $form): Form
    {
        $items = Item::get();

        return $form
            ->schema([
                Forms\Components\Select::make('id_maintenance')
                    ->label(__('filament-panels::pages/budget.form.ticket.label'))
                    ->options(
                        Maintenance::where('is_open', '1')
                            ->where(function ($query) {
                                $query->where('status', '!=', 'Finished')
                                    ->orWhereNull('status');
                            })
                            ->pluck('ticket', 'id')
                    )
                    ->placeholder(__('filament-panels::pages/budget.form.ticket.placeholder'))
                    ->selectablePlaceholder(false)
                    ->suffixIcon('heroicon-m-tag')
                    ->preload()
                    ->searchable()
                    ->required()
                    ->disabledOn('edit')
                    ->helperText(__('filament-panels::pages/budget.form.ticket.helper'))
                    ->unique(ignorable: fn ($record) => $record),
                Forms\Components\TextInput::make('editor')
                    ->label(__('filament-panels::pages/budget.form.editor.label'))
                    ->required()
                    ->hiddenOn('create')
                    ->helperText(__('filament-panels::pages/budget.form.editor.helper')),
                Forms\Components\TextInput::make('status')
                    ->label(__('filament-panels::pages/budget.form.status.label'))
                    ->required()
                    ->readOnly()
                    ->visible(false)
                    ->default('Pending')
                    ->placeholder('Budget is being proposed')
                    ->helperText(__('filament-panels::pages/budget.form.status.helper')),
                Forms\Components\Section::make('Service Fee')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('transport')
                            ->label('Transportation + Accomodation + Consumption')
                            ->required()
                            ->native(false)
                            ->options(function (): array {
                                return Site::query()
                                    ->limit(100)
                                    ->distinct()
                                    ->get()
                                    ->mapWithKeys(function (Site $site) {
                                        return [$site->price => $site->name];
                                    })
                                    ->toArray();
                            })
                            ->getSearchResultsUsing(function (string $search): array {
                                return Site::query()
                                    ->where(function (Builder $builder) use ($search) {
                                        $searchString = "%$search%";
                                        $builder->where('name', 'like', $searchString)
                                            ->orWhere('price', 'like', $searchString);
                                    })
                                    ->limit(2)
                                    ->get()
                                    ->mapWithKeys(function (Site $site) {
                                        return [$site->price => $site->name];
                                    })
                                    ->toArray();
                            })
                            ->searchable()
                            ->preload()
                            ->selectablePlaceholder(false)
                            ->searchPrompt('Search site by their name')
                            ->live(debounce: 500, onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set) {
                                self::updateTotals($get, $set);
                            }),
                    ]),
                Forms\Components\Section::make('Spareparts Requirement')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->label('Select what you need')
                            ->schema([
                                Forms\Components\Select::make('item_id')
                                    ->label(__('filament-panels::pages/budget.form.items.label'))
                                    ->options(
                                        $items->mapWithKeys(function (Item $item) {
                                            return [$item->id => sprintf('%s', $item->name, $item->price_int)];
                                        })
                                    )
                                    ->required()
                                    ->searchable()
                                    ->live(debounce: 500, onBlur: true)
                                    ->preload()
                                    ->helperText(__('filament-panels::pages/budget.form.items.helper'))
                                    ->disableOptionWhen(function ($value, $state, Get $get) {
                                        return collect($get('../*.item_id'))
                                            ->reject(fn ($id) => $id == $state)
                                            ->filter()
                                            ->contains($value);
                                    }),
                                Forms\Components\TextInput::make('quantity')
                                    ->integer()
                                    ->default(1)
                                    ->required(),
                            ])
                            ->live(debounce: 500, onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set) {
                                self::updateTotals($get, $set);
                            })
                            ->deleteAction(
                                fn (ActionForm $action) => $action->after(fn (Get $get, Set $set) => self::updateTotals($get, $set)),
                            )
                            ->columns(2)
                            ->addActionLabel('Add new item')
                            ->reorderable(true)
                            ->reorderableWithDragAndDrop(true)
                            ->collapsible(),
                    ]),
                Forms\Components\Section::make('Total Budget')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('subtotal')
                            ->numeric()
                            ->readOnlyOn('create')
                            ->prefix('Rp.')
                            ->afterStateHydrated(function (Get $get, Set $set) {
                                self::updateTotals($get, $set);
                            }),
                        Forms\Components\TextInput::make('taxes')
                            ->suffix('%')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->readOnlyOn('create')
                            ->live(debounce: 500, onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set) {
                                self::updateTotals($get, $set);
                            }),
                        Forms\Components\TextInput::make('value')
                            ->label(__('filament-panels::pages/budget.form.value.label'))
                            ->numeric()
                            ->readOnlyOn('create')
                            ->prefix('Rp.'),
                    ]),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('10s')
            ->deferLoading()
            ->striped()
            ->recordUrl(null)
            ->recordAction(null)
            ->columns([
                TextColumn::make('maintenance.ticket')
                    ->label(__('filament-panels::pages/budget.table.ticket.label'))
                    ->badge()
                    ->copyable()
                    ->searchable()
                    ->color('info'),
                IconColumn::make('status')
                    ->default(__('filament-panels::pages/budget.table.status.default_str'))
                    ->icon(fn (string $state): string => match ($state) {
                        'Rejected' => 'heroicon-o-x-mark',
                        'Pending' => 'heroicon-o-clock',
                        'Approve' => 'heroicon-o-check-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'info',
                        'Rejected' => 'danger',
                        'Approve' => 'success',
                        default => 'gray',
                    })
                    ->tooltip(fn (string $state): string => match ($state) {
                        'Pending' => __('filament-panels::pages/budget.table.status.tooltip.row1'),
                        'Rejected' => __('filament-panels::pages/budget.table.status.tooltip.row2'),
                        'Approve' => __('filament-panels::pages/budget.table.status.tooltip.row3'),
                    }),
                TextColumn::make('value')
                    ->label(__('filament-panels::pages/budget.table.value.label'))
                    ->currency('IDR')
                    ->hidden(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->hasPermissionTo('can-view-value Budget'))
                            return false;
                        else
                            return true;
                    }),
                TextColumn::make('editor')
                    ->label(__('filament-panels::pages/budget.table.editor.label'))
                    ->wrap(),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::pages/budget.table.created.label'))
                    ->wrap()
                    ->dateTime()
                    ->sortable()
                    ->default('-')
                    ->description(fn (Budget $record): string => __('filament-panels::pages/budget.table.created.update') . Carbon::create($record->updated_at)->diffForHumans()),
            ])
            ->filters([
                SelectFilter::make('editor')
                    ->label(__('filament-panels::pages/budget.filter_label'))
                    ->options(User::where('level', 'Helpdesk')->pluck('name', 'id')),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make()
                        ->label('Timeline')
                        ->color('info')
                        ->icon('heroicon-o-queue-list'),
                    Tables\Actions\DeleteAction::make(),
                    ActionTable::make('pdf')
                        ->label('Download')
                        ->icon('heroicon-o-cloud-arrow-down')
                        ->color('success')
                        ->requiresConfirmation()
                        ->hidden(function (Budget $record): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasPermissionTo('download-pdf Budget')) {
                                if ($record->maintenance->dispatch_status == null) {
                                    return true;
                                } else {
                                    return false;
                                }
                            } else {
                                return true;
                            }
                        })
                        ->disabled(fn (Budget $record): bool => $record->status != 'Approve' ? true : false)
                        ->action(function (Budget $record) {
                            return response()->streamDownload(function () use ($record) {
                                echo Pdf::loadHtml(
                                    Blade::render('budget_pdf2', ['record' => $record])
                                )->stream();
                            }, 'WISETicketApp-ItemReq-' . $record->maintenance->ticket . '.pdf');
                        })
                        ->tooltip('Download Budget Review'),
                ])
                    ->tooltip(__('filament-panels::pages/budget.action.tooltip')),
                ActionTable::make('item')
                    ->label('Detail')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->button()
                    ->hidden(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->hasPermissionTo('view-detail Budget'))
                            return false;
                        else
                            return true;
                    })
                    ->action(function (Budget $record) {
                        return redirect()->route('filament.wise.resources.budgets.view-item', $record->id);
                    }),
            ], position: ActionsPosition::AfterColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->hidden(function (): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasPermissionTo('delete Budget'))
                                return false;
                            else
                                return true;
                        }),
                    ExportBulkAction::make()
                ]),
            ])
            ->defaultPaginationPageOption(25)
            ->emptyStateHeading(__('filament-panels::pages/budget.state.empty.heading'))
            ->emptyStateDescription(__('filament-panels::pages/budget.state.empty.description'));
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBudgets::route('/'),
            'create' => Pages\CreateBudget::route('/create'),
            'edit' => Pages\EditBudget::route('/{record}/edit'),
            'view' => Pages\ViewBudget::route('/{record}/view'),
            'view-item' => Pages\ViewItemList::route('/{record}/item')
        ];
    }

    public static function updateTotals(Get $get, Set $set): void
    {
        // Get transport
        $transport = (int) $get('transport');

        // Retrieve all selected products and remove empty rows
        $selectedProducts = collect($get('items'))->filter(fn ($item) => !empty($item['item_id']) && !empty($item['quantity']));

        // Retrieve prices for all selected products
        $prices = Item::find($selectedProducts->pluck('item_id'))->pluck('price_int', 'id');

        // Calculate subtotal based on the selected products and quantities
        (int) $subtotal = $selectedProducts->reduce(function ($subtotal, $product) use ($prices) {
            return $subtotal + ($prices[$product['item_id']] * $product['quantity']);
        }, 0);

        // Update the state with the new values
        $set('subtotal', (int) number_format($subtotal + $transport, 2, '.', ''));
        $set('value', (int) number_format($subtotal + $transport + ($subtotal * ((int) $get('taxes') / 100)), 2, '.', ''));
    }
}
