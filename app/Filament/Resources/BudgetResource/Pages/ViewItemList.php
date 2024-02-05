<?php

namespace App\Filament\Resources\BudgetResource\Pages;

use Filament\Forms;
use App\Models\Item;
use App\Models\Budget;
use App\Models\Timeline;
use Filament\Infolists\Infolist;
use Illuminate\Support\Facades\Auth;
use Filament\Infolists\Components\Split;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\BudgetResource;
use Filament\Actions\Action as ActionPage;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Section;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;

class ViewItemList extends ViewRecord
{
    use InteractsWithRecord;

    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    protected static string $resource = BudgetResource::class;

    public function getTitle(): string | Htmlable
    {
        return __('Detail of Budget');
    }

    protected function getHeaderActions(): array
    {
        return [
            ActionPage::make('refresh')
                ->icon('heroicon-o-arrow-path')
                ->color('success')
                ->action(function (): void {
                    $this->refreshFormData([
                        'taxes',
                        'value',
                        'items',
                        'transport',
                        'accom',
                        'consumpt',
                        'status',
                        'editor',
                    ]);

                    Notification::make()
                        ->title('Data refreshed')
                        ->icon('heroicon-o-arrow-path')
                        ->iconColor('success')
                        ->send();
                })
        ];
    }

    // public static function canAccess(): bool
    // {
    //     /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
    //     if (Auth::user()->hasRole(['DACSO', 'Super Admin']))
    //         return true;
    //     else
    //         return false;
    // }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Information')
                    // ->aside()
                    ->icon('heroicon-m-information-circle')
                    ->description('This data is obtained in a real-time way from the database')
                    ->schema([
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'Pending' => 'info',
                                'Rejected' => 'danger',
                                'Approve' => 'success',
                                default => 'gray',
                            }),
                        TextEntry::make('editor')
                            ->label('Created by'),
                        TextEntry::make('maintenance.ticket')
                            ->label('Ticket'),
                    ])->columns(3),
                Section::make('Spareparts Requirement')
                    // ->aside()
                    ->description('The items that the Helpdesk has selected for Engineer Onsite needs')
                    ->icon('heroicon-m-cube')
                    ->schema([
                        RepeatableEntry::make('item')
                            ->label('Item')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Sparepart Name')
                                    ->color('primary'),
                                TextEntry::make('pivot.quantity')
                                    ->label('Quantity')
                                    ->color('primary'),
                                TextEntry::make('unit')
                                    ->label('Item Unit')
                                    ->color('primary'),
                                TextEntry::make('price_int')
                                    ->label('Item Price')
                                    ->prefix('Rp. ')
                                    ->color('primary')
                                    ->numeric(
                                        decimalPlaces: 0,
                                        decimalSeparator: '.',
                                        thousandsSeparator: ',',
                                    ),
                                TextEntry::make('pivot.quantity')
                                    ->label('Subtotal')
                                    ->color('primary')
                                    ->numeric(
                                        decimalPlaces: 0,
                                        decimalSeparator: '.',
                                        thousandsSeparator: ',',
                                    )
                                    ->formatStateUsing(function (string $state, Item $record): string {
                                        return "Rp. " . number_format($state * $record->price_int, 0, '.', ',');
                                    }),
                            ])
                            ->columns(5),
                    ]),
                Split::make([
                    Section::make('Service Fee')
                        ->icon('heroicon-m-map')
                        ->schema([
                            TextEntry::make('transport')
                                ->label('Transportation')
                                ->prefix('Rp. ')
                                ->color('primary')
                                ->numeric(
                                    decimalPlaces: 0,
                                    decimalSeparator: '.',
                                    thousandsSeparator: ',',
                                )
                                ->size(TextEntry\TextEntrySize::Large),
                        ]),
                    Section::make('Total Budget Amount')
                        ->icon('heroicon-m-banknotes')
                        ->schema([
                            TextEntry::make('value')
                                ->label('Total Price')
                                ->prefix('Rp. ')
                                ->color('primary')
                                ->numeric(
                                    decimalPlaces: 0,
                                    decimalSeparator: '.',
                                    thousandsSeparator: ',',
                                )
                                ->size(TextEntry\TextEntrySize::Large),
                        ]),
                ])->from('lg'),
                Section::make('Actions')
                    ->visible(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if ($this->record->status == 'Approve' || Auth::user()->hasRole('DACSO')) {
                            return false;
                        } else {
                            return true;
                        }
                    })
                    ->description('What is your decision on this budget?')
                    ->aside()
                    ->schema([
                        Actions::make([
                            Action::make('Reject')
                                ->icon('heroicon-o-x-mark')
                                ->color('danger')
                                ->hidden(function (): bool {
                                    /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                                    if (auth()->user()->hasPermissionTo('reject Budget')) {
                                        return false;
                                    } else {
                                        return true;
                                    }
                                })
                                ->disabled(fn (Budget $record) => $record->status == 'Rejected' || $record->status == 'Approve' ? true : false)
                                ->requiresConfirmation()
                                ->form([
                                    Forms\Components\TextInput::make('reject_reason')
                                        ->label('Why do you reject this proposal? Tell us please..')
                                        ->required(),
                                ])
                                ->action(function (array $data, Budget $budget): void {
                                    // $budget->advance();
                                    Timeline::create([
                                        'id_budget' => $budget->id,
                                        'reject_reason' => $data['reject_reason'],
                                        'repellent' => auth()->user()->name
                                    ]);
                                    $budget->rejectBudget();
                                })
                                ->slideOver()
                                ->tooltip('Reject this Budget'),
                            Action::make('Approve')
                                ->icon('heroicon-o-check-badge')
                                ->color('success')
                                ->hidden(function (): bool {
                                    /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                                    if (auth()->user()->hasPermissionTo('approve Budget')) {
                                        return false;
                                    } else {
                                        return true;
                                    }
                                })
                                ->disabled(fn (Budget $record) => $record->status == 'Approve' ? true : false)
                                ->requiresConfirmation()
                                ->action(function (Budget $budget) {
                                    $budget->approveBudget();
                                })
                                ->tooltip('Approve this Budget'),
                        ])
                            ->fullWidth(),
                    ]),
            ])
            ->columns(1);
    }
}
