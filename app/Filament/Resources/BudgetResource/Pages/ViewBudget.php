<?php

namespace App\Filament\Resources\BudgetResource\Pages;

use App\Models\Timeline;
use Filament\Actions\Action;
use Filament\Infolists\Infolist;
use Filament\Actions\ActionGroup;
use Filament\Support\Enums\ActionSize;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\BudgetResource;
use Illuminate\Contracts\Support\Htmlable;
use JaOcero\ActivityTimeline\Components\ActivityDate;
use JaOcero\ActivityTimeline\Components\ActivityIcon;
use JaOcero\ActivityTimeline\Components\ActivityTitle;
use JaOcero\ActivityTimeline\Components\ActivitySection;
use JaOcero\ActivityTimeline\Components\ActivityDescription;

class ViewBudget extends ViewRecord
{
    protected static string $resource = BudgetResource::class;

    public function getTitle(): string | Htmlable
    {
        return __('Timeline View');
    }

    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                Action::make('refresh')
                    ->icon('heroicon-o-arrow-path')
                    ->color('success')
                    ->action(function (): void {
                        $this->refreshFormData([
                            'id_budget',
                            'reject_reason',
                            'repellent',
                            'created_at',
                        ]);

                        Notification::make()
                            ->title('Data refreshed')
                            ->icon('heroicon-o-arrow-path')
                            ->iconColor('success')
                            ->send();
                    }),
                Action::make('back')
                    ->label('Back to List')
                    ->icon('heroicon-o-chevron-left')
                    ->color('info')
                    ->url(route('filament.wise.resources.budgets.index')),
            ])
                ->label('More actions')
                ->icon('heroicon-m-ellipsis-vertical')
                ->size(ActionSize::Small)
                ->color('primary')
                ->button(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->state([
                'activities' => Timeline::select('*')
                    ->where('id_budget', $this->record->id)
                    ->orderBy('id', 'desc')
                    ->get()
                    ->toArray(),
            ])
            ->schema([
                ActivitySection::make('activities')
                    ->label('Rejection Timeline')
                    ->description('These are the rejection timeline that have been recorded.')
                    ->schema([
                        ActivityTitle::make('repellent')
                            ->placeholder('No title is set'),
                        ActivityDescription::make('reject_reason')
                            ->placeholder('No description is set'),
                        ActivityDate::make('created_at')
                            ->date('F j, Y - H:i:s')
                            ->placeholder('No date is set.'),
                        ActivityIcon::make('budget.status')
                            ->icon(fn (string | null $state): string | null => match ($state) {
                                default => 'heroicon-o-clock',
                            })
                            ->color(fn (string | null $state): string | null => match ($state) {
                                default => 'info',
                            }),
                    ])
                    ->showItemsCount(5) // Show up to 2 items
                    ->showItemsLabel('View more') // Show "View Old" as link label
                    ->showItemsIcon('heroicon-m-chevron-down') // Show button icon
                    ->showItemsColor('gray') // Show button color and it supports all colors
                    ->aside(false)
                    ->columnSpan('full')
            ]);
    }
}
