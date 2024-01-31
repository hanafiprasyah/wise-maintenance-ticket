<?php

namespace App\Filament\Resources\MaintenanceResource\Pages;

use Filament\Forms;
use App\Models\User;
use App\Models\Caused;
use App\Models\Product;
use App\Models\Maintenance;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Infolists\Infolist;
use Filament\Actions\ActionGroup;
use App\Models\TimelineMaintenance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Filament\Support\Enums\ActionSize;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action as ActionPage;
use Filament\Notifications\Actions\Action;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\MaintenanceResource;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;

class ViewTimelineMaintenance extends ViewRecord
{
    use InteractsWithRecord;

    protected static string $resource = MaintenanceResource::class;

    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    public function getTitle(): string | Htmlable
    {
        return __('Ticket Progress Confirmation');
    }

    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                ActionPage::make('refresh')
                    ->icon('heroicon-o-arrow-path')
                    ->color('success')
                    ->action(function (): void {
                        $this->refreshFormData([
                            'id_maintenance',
                            'content',
                            'editor',
                            'created_at',
                        ]);

                        Notification::make()
                            ->title('Data refreshed')
                            ->icon('heroicon-o-arrow-path')
                            ->iconColor('success')
                            ->send();
                    }),
                ActionPage::make('createTimeline')
                    ->icon('heroicon-o-plus')
                    ->color('primary')
                    ->visible(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->hasRole(['Super Admin', 'Engineer', 'Helpdesk']) && $this->record->is_open == 1)
                            return true;
                        else
                            return false;
                    })
                    ->form([
                        Forms\Components\Select::make('caused')
                            ->label(__('filament-panels::pages/maintenance.form.caused.label'))
                            ->options(Caused::all()->pluck('name', 'name'))
                            ->preload()
                            ->required()
                            ->live()
                            ->multiple()
                            ->columnSpanFull()
                            ->validationMessages([
                                'required' => __('filament-panels::pages/maintenance.validation.required.caused')
                            ]),
                        Forms\Components\Select::make('type')
                            ->label('Type of Work')
                            ->required()
                            ->searchable()
                            ->multiple()
                            ->preload()
                            ->columnSpanFull()
                            ->options(Product::all()->pluck('name', 'name')),
                        Forms\Components\RichEditor::make('content')
                            ->label('Description (Optional)')
                            ->toolbarButtons([
                                'blockquote',
                                'bold',
                                'bulletList',
                                'h2',
                                'h3',
                                'italic',
                                'redo',
                                'underline',
                                'undo',
                            ])
                            ->disableToolbarButtons([
                                'attachFiles',
                                'strike',
                                'link',
                                'orderedList',
                                'codeBlock',
                            ]),
                    ])
                    ->action(function (array $data, Maintenance $record): void {
                        $record->update([
                            'updated_at' => 'now',
                        ]);

                        TimelineMaintenance::insert([
                            'id_maintenance' => $record->id,
                            'caused' => json_encode($data['caused']),
                            'type' => json_encode($data['type']),
                            'content' => $data['content'],
                            'editor' => auth()->user()->name,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);

                        Notification::make()
                            ->title('New timeline created')
                            ->icon('heroicon-o-arrow-path')
                            ->iconColor('success')
                            ->send();

                        // Send notification to User, Helpdesk and super admin after confirmation
                        Notification::make()
                            ->title('Progress Confirmation')
                            ->info()
                            ->body('Ticket : ' . $record->ticket . '. EOS has updated the progress of activities on the site. Check it out!')
                            ->actions([
                                Action::make('view')
                                    ->label('View Progress')
                                    ->button()
                                    ->color('primary')
                                    ->url(route('filament.wise.resources.problem-tickets.maintenance-timeline', $record->id)),
                            ])
                            ->sendToDatabase(User::where('level', 'Super Admin')
                                ->orWhere('level', 'Helpdesk')
                                ->orWhere('level', 'Management')
                                ->get());
                    }),
                ActionPage::make('download')
                    ->label('Download PDF')
                    ->icon('heroicon-o-cloud-arrow-down')
                    ->visible(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->can('view-any Maintenance'))
                            return true;
                        else
                            return false;
                    })
                    ->disabled(function (TimelineMaintenance $timeline): bool {
                        if ($timeline->count() === 0)
                            return true;
                        else
                            return false;
                    })
                    ->color('info')
                    ->action(function (Maintenance $record) {
                        Notification::make()
                            ->title('PDF Downloaded')
                            ->icon('heroicon-o-arrow-path')
                            ->iconColor('success')
                            ->send();

                        return response()->streamDownload(function () use ($record) {
                            echo Pdf::loadHtml(
                                Blade::render('maintenance_progress_pdf', ['record' => $record])
                            )->stream();
                        }, 'WISETicketApp-ProgressConfirm-' . $record->ticket . '.pdf');
                    }),
            ])
                ->label('More actions')
                ->icon('heroicon-m-ellipsis-vertical')
                ->size(ActionSize::Small)
                ->color('primary')
                ->button(),
        ];
    }

    // public static function canAccess(): bool
    // {
    //     /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
    //     if (Auth::user()->hasRole(['DACSO', 'Super Admin', 'Engineer', 'Helpdesk', 'Management']))
    //         return true;
    //     else
    //         return false;
    // }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->state([
                'activities' => TimelineMaintenance::where('id_maintenance', '1')
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->toArray(),
            ])
            ->schema([
                RepeatableEntry::make('activities')
                    ->schema([
                        TextEntry::make('caused')
                            ->label('Problem caused by')
                            ->listWithLineBreaks()
                            ->bulleted()
                            ->color('primary')
                            ->separator(','),
                        TextEntry::make('type')
                            ->label('Type of Work')
                            ->listWithLineBreaks()
                            ->bulleted()
                            ->color('primary')
                            ->separator(','),
                        TextEntry::make('content')
                            ->label('Description')
                            ->default('-')
                            ->html(),
                        TextEntry::make('editor')
                            ->label('Created by'),
                        TextEntry::make('created_at')
                            ->label('Date')
                            ->dateTime(),
                    ])
            ])->columns(1);
    }
}
