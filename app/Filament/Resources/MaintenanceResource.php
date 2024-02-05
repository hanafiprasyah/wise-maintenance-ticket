<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\Site;
use App\Models\User;
use Filament\Tables;
use App\Models\Contact;
use App\Models\Problem;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Maintenance;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Cheesegrits\FilamentPhoneNumbers;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\Alignment;
use Illuminate\Support\Facades\Blade;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Actions\ActionGroup;
use App\Filament\Resources\MaintenanceResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class MaintenanceResource extends Resource
{
    protected static ?string $model = Maintenance::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $activeNavigationIcon = 'heroicon-s-wrench-screwdriver';
    protected static ?string $slug = 'problem-tickets';
    protected static ?string $navigationGroup = 'Mandatory';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('is_open', '<>', '1')->count() > 5 ? 'danger' : 'primary';
    }

    public static function getNavigationLabel(): string
    {
        return __('Problem Ticket');
    }

    public static function getModelLabel(): string
    {
        return __('Problem Ticket');
    }

    public static function shouldRegisterNavigation(): bool
    {
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        if (Auth::user()->can('view-any Maintenance'))
            return true;
        else
            return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_site')
                    ->label('Site/Area')
                    ->options(Site::all()->pluck('name', 'id'))
                    ->preload()
                    ->required()
                    ->searchable()
                    ->live()
                    ->validationMessages([
                        'required' => __('Please select one site/area')
                    ]),
                Forms\Components\Select::make('pic')
                    ->label('Site PIC')
                    ->options(Contact::all()->pluck('name', 'name'))
                    ->preload()
                    ->required()
                    ->searchable()
                    ->validationMessages([
                        'required' => __('Please select PIC at the site/area')
                    ]),
                Forms\Components\Section::make('Analyzing')
                    ->description('You can tell us what you experienced. So that we can follow up on the problem')
                    ->icon('heroicon-m-magnifying-glass-circle')
                    ->schema([
                        Forms\Components\Select::make('problem')
                            ->label('Problem')
                            ->options(Problem::all()->pluck('name', 'name'))
                            ->preload()
                            ->required()
                            ->live()
                            ->multiple()
                            ->columnSpanFull()
                            ->validationMessages([
                                'required' => __('Please tell us the problem')
                            ]),
                    ]),
                Forms\Components\Select::make('status')
                    ->label('Progress Status')
                    ->options([
                        'Need to Replace Unit' => 'Need to Replace Unit',
                        'Send Unit to Factory' => 'Send Unit to Factory',
                        'Packaging' => 'Packaging',
                        'Need to Service Onsite' => 'Need to Service Onsite',
                        'Finished' => 'Finished',
                    ])
                    ->hiddenOn('create')
                    ->helperText('Keep this blank if it just started'),
                Forms\Components\Textarea::make('note')
                    ->label('Note (Optional)')
                    ->autosize()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $closeIcon = 'heroicon-s-x-circle';
        $stopIcon = 'heroicon-s-check';
        $statusIcon = 'heroicon-s-arrow-path';

        return $table
            ->poll('10s')
            ->deferLoading()
            ->striped()
            ->recordUrl(null)
            ->recordAction(null)
            ->columns([
                IconColumn::make('is_open')
                    ->label('Progress')
                    ->alignment(Alignment::Center)
                    ->boolean()
                    ->tooltip(fn (string $state): string => match ($state) {
                        '0' => __('Closed'),
                        '1' => __('Open')
                    })
                    ->boolean(),
                TextColumn::make('site.name')
                    ->label('Site/Area')
                    ->searchable()
                    ->default('-')
                    ->description(fn (Maintenance $record): string => $record->site->resort->name),
                TextColumn::make('contact.name')
                    ->label('Site PIC')
                    ->searchable()
                    ->wrap(),
                FilamentPhoneNumbers\Columns\PhoneNumberColumn::make('contact.phone')
                    ->region('ID')
                    ->badge()
                    ->hidden(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->hasRole(['Helpdesk', 'Super Admin']))
                            return false;
                        else
                            return true;
                    })
                    ->color('lime')
                    ->dial(),
                TextColumn::make('ticket')
                    ->label('Ticket ID')
                    ->badge()
                    ->searchable()
                    ->color('info')
                    ->wrap()
                    ->copyable(),
                TextColumn::make('status')
                    ->label('Ticket Status')
                    ->badge()
                    ->default('Unresolved by Helpdesk')
                    ->color(fn (string $state): string => match ($state) {
                        'Packaging' => 'info',
                        'Send Unit to Factory' => 'warning',
                        'Finished' => 'success',
                        'Need to Service Onsite' => 'purple',
                        'Need to Replace Unit' => 'danger',
                        default => 'gray'
                    }),
                TextColumn::make('problem')
                    ->label('Problems')
                    ->badge()
                    ->searchable()
                    ->color('primary'),
                TextColumn::make('timelineMaintenance.caused')
                    ->label('Caused by')
                    ->default('Waiting for Confirmation from EOS')
                    ->badge()
                    ->searchable()
                    ->color('primary'),
                TextColumn::make('note')
                    ->label('Note')
                    ->hidden(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->hasRole(['DACSO']))
                            return true;
                        else
                            return false;
                    })
                    ->wrap()
                    ->default('-'),
                TextColumn::make('dispatch_status')
                    ->label('Dispatch Status')
                    ->badge()
                    ->searchable()
                    ->hidden(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->hasRole(['Helpdesk', 'Engineer', 'Super Admin']))
                            return false;
                        else
                            return true;
                    })
                    ->default(function (Maintenance $record): string {
                        if ($record->budget == null)
                            return 'Waiting for Helpdesk Response';
                        else if ($record->budget->status == 'Pending' || $record->budget->status == 'Rejected')
                            return 'Waiting for Budget Approval';
                        else
                            return 'Unassigned';
                    })
                    ->color('danger'),
                TextColumn::make('created_at')
                    ->label('Reported at')
                    ->wrap()
                    ->dateTime()
                    ->sortable()
                    ->default('-')
                    ->description(fn (Maintenance $record): string => $record->updated_at ==
                        null ? '-'
                        : __('Last updated ') . Carbon::create($record->updated_at)->diffForHumans()),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                        ->hidden(function (Maintenance $record): bool {
                            if ($record->is_open == 0) {
                                return false;
                            } else {
                                return true;
                            }
                        }),
                    Action::make('close')
                        ->icon($closeIcon)
                        ->color('primary')
                        ->hidden(function (Maintenance $record): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasPermissionTo('update-close-ticket Maintenance')) {
                                if ($record->is_open == 0) {
                                    return true;
                                }
                                return false;
                            } else {
                                return true;
                            }
                        })
                        ->disabled(function (Maintenance $record): bool {
                            if ($record->status == 'Finished') {
                                return true;
                            } else {
                                return false;
                            }
                        })
                        ->label('Close Ticket')
                        ->requiresConfirmation()
                        ->action(function (Maintenance $maintenance) {
                            $maintenance->closeMaintenance();
                        }),
                    Action::make('stop')
                        ->icon($stopIcon)
                        ->color('success')
                        ->disabled(function (Maintenance $maintenance): bool {
                            if ($maintenance->status == 'Finished') {
                                return true;
                            } else {
                                return false;
                            }
                        })
                        ->hidden(function (Maintenance $record): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasPermissionTo('mark-as-done Maintenance')) {
                                if ($record->is_open == 0) {
                                    return true;
                                }
                                return false;
                            } else {
                                return true;
                            }
                        })
                        ->label('Mark as Done')
                        ->requiresConfirmation()
                        ->action(function (Maintenance $maintenance) {
                            $maintenance->markAsDone();
                        }),
                    Action::make('status')
                        ->icon($statusIcon)
                        ->color('purple')
                        ->hidden(function (Maintenance $record): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasPermissionTo('update Maintenance')) {
                                if ($record->is_open == 0) {
                                    return true;
                                }
                                return false;
                            } else {
                                return true;
                            }
                        })
                        ->label('Change Status')
                        ->requiresConfirmation()
                        ->form([
                            Select::make('status')
                                ->label('Change Progress Status')
                                ->options([
                                    'Need to Replace Unit' => 'Need to Replace Unit',
                                    'Send Unit to Factory' => 'Send Unit to Factory',
                                    'Packaging' => 'Packaging',
                                    'Need to Service Onsite' => 'Need to Service Onsite',
                                    // 'Finished' => 'Finished',
                                ])
                                ->required()
                        ])
                        ->action(function (array $data, Maintenance $maintenance): void {
                            if ($data['status'] == 'Finished') {
                                Notification::make()
                                    ->title('Problem has been Finished by EOS')
                                    ->success()
                                    ->body(auth()->user()->name . ' has updated ticket status at ' . now() . '.')
                                    ->sendToDatabase(User::where('level', 'Super Admin')->orWhere('level', 'Helpdesk')->get());
                            } else {
                                Notification::make()
                                    ->title('New ticket status updated: ' . $data['status'])
                                    ->info()
                                    ->body(auth()->user()->name . ' has updated ticket: ' . $maintenance->ticket . ' at ' . now() . '.')
                                    ->sendToDatabase(User::where('level', 'Super Admin')->orWhere('level', 'Helpdesk')->get());
                            }

                            $maintenance->update([
                                'status' => $data['status'],
                            ]);
                        })
                        ->slideOver(),
                    Action::make('timeline')
                        ->label('Progress Confirmation')
                        ->icon('heroicon-m-clipboard-document-list')
                        ->iconPosition(IconPosition::After)
                        ->color('info')
                        ->visible(function (Maintenance $record): string {
                            if ($record->dispatch_status == null)
                                return false;
                            else
                                return true;
                        })
                        ->action(function (Maintenance $maintenance) {
                            return redirect()->route('filament.wise.resources.problem-tickets.maintenance-timeline', $maintenance->id);
                        }),
                    Action::make('download')
                        ->label('Final Report')
                        ->icon('heroicon-m-document')
                        ->iconPosition(IconPosition::After)
                        ->color('primary')
                        ->visible(function (Maintenance $record): string {
                            if ($record->is_open == 0)
                                return true;
                            else
                                return false;
                        })
                        ->disabled(function (): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasRole(['Super Admin', 'Management'])) {
                                return false;
                            } else {
                                return true;
                            }
                        })
                        ->action(function (Maintenance $record) {
                            return response()->streamDownload(function () use ($record) {
                                echo Pdf::loadHtml(
                                    Blade::render('final_report', ['record' => $record])
                                )->stream();
                            }, 'WISETicketApp-FinalReport-' . $record->ticket . '.pdf');
                        }),
                ])
                    ->tooltip('Actions'),
                Action::make('fetch')
                    ->label('Dispatch to EOS')
                    ->icon('heroicon-m-paper-airplane')
                    ->iconPosition(IconPosition::After)
                    ->button()
                    ->requiresConfirmation()
                    ->hidden(function (Maintenance $record): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->hasPermissionTo('dispatch-ticket Maintenance')  && $record->dispatch_status == null) {
                            return false;
                        } else {
                            return true;
                        }
                    })
                    ->disabled(function (Maintenance $maintenance): bool {
                        if ($maintenance->budget == null)
                            return true;
                        else if ($maintenance->budget->status == 'Approve')
                            return false;
                        else
                            return true;
                    })
                    ->action(function (Maintenance $maintenance): void {
                        $maintenance->dispatchToEOS();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->hidden(function (): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasPermissionTo('delete Maintenance'))
                                return false;
                            else
                                return true;
                        }),
                    ExportBulkAction::make()
                ]),
            ])
            ->defaultPaginationPageOption(25)
            ->emptyStateHeading('No ticket found')
            ->emptyStateDescription('Ticket list will appear here.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaintenances::route('/'),
            'create' => Pages\CreateMaintenance::route('/create'),
            'edit' => Pages\EditMaintenance::route('/{record}/edit'),
            'maintenance-timeline' => Pages\ViewTimelineMaintenance::route('/{record}/maintenance-timeline')
        ];
    }
}
