<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Verified' => Tab::make()
                ->modifyQueryUsing(function ($query) {
                    $query->where('email_verified_at', '!=', null);
                })
                // ->icon('heroicon-m-x-mark')
                ->badge(User::query()->where('email_verified_at', '!=', null)->count())
                ->badgeColor('success'),
            'Unverified' => Tab::make()
                ->modifyQueryUsing(function ($query) {
                    $query->where('email_verified_at', null);
                })
                // ->icon('heroicon-m-check-circle')
                ->badge(User::query()->where('email_verified_at', null)->count())
                ->badgeColor('danger'),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'Verified';
    }
}
