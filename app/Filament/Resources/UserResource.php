<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Enums\ActionsPosition;
use App\Filament\Resources\UserResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Tapp\FilamentAuthenticationLog\RelationManagers\AuthenticationLogsRelationManager;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $activeNavigationIcon = 'heroicon-s-user-group';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'primary';
    }

    public static function getNavigationLabel(): string
    {
        return __('Users');
    }

    public static function shouldRegisterNavigation(): bool
    {
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        if (Auth::user()->can('view-any User'))
            return true;
        else
            return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('roles')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Full Name')
                    ->required()
                    ->autocapitalize('words')
                    // ->extraAlpineAttributes(['@input' => '$el.value = $el.value.toUpperCase()'])
                    ->unique(ignorable: fn ($record) => $record),
                Forms\Components\TextInput::make('email')
                    ->label('Active Email')
                    ->required()
                    ->email()
                    ->unique(ignorable: fn ($record) => $record),
                Forms\Components\TextInput::make('password')
                    ->label('User Password')
                    ->required()
                    ->minLength(8)
                    ->password()
                    ->hiddenOn('edit'),
            ]);
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
                TextColumn::make('name')
                    ->label('Full Name')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('roles.name')
                    ->label('Roles')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Engineer' => 'info',
                        'Helpdesk' => 'warning',
                        'Management' => 'success',
                        'DACSO' => 'purple',
                        'Super Admin' => 'lime',
                    })
                    ->searchable()
                    ->wrap(),
                TextColumn::make('email')
                    ->label('Registered Email')
                    ->searchable()
                    ->wrap()
                    ->icon(fn (User $record): string => $record->hasVerifiedEmail() == null ? null : 'heroicon-m-check-badge')
                    ->iconPosition(IconPosition::Before)
                    ->iconColor(Color::Sky)
                    ->tooltip(fn (User $record): string => $record->hasVerifiedEmail() == null ? 'Unverified User' : 'Verified User'),
            ])
            ->filters([
                SelectFilter::make('level')
                    ->multiple()
                    ->options([
                        'Super Admin' => 'Super Admin',
                        'Management' => 'Management',
                        'Helpdesk' => 'Helpdesk',
                        'Engineer' => 'Engineer',
                        'DACSO' => 'DACSO',
                    ])
            ])
            ->actions([
                Action::make('activities')
                    ->icon('heroicon-s-chat-bubble-bottom-center-text')
                    ->color('primary')
                    ->hidden(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->hasRole('Super Admin'))
                            return false;
                        else
                            return true;
                    })
                    ->label('Activities')
                    ->url(fn ($record) => UserResource::getUrl('activities', ['record' => $record])),
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Action::make('verify')
                        ->icon('heroicon-s-check-badge')
                        ->color('primary')
                        ->hidden(fn (User $user): bool => $user->hasVerifiedEmail() != null ? true : false)
                        ->label('Verify User')
                        ->requiresConfirmation()
                        ->action(function (User $user) {
                            $user->verifyUser();
                        }),
                    Action::make('send')
                        ->icon('heroicon-m-envelope')
                        ->color('info')
                        ->hidden(function (): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasRole('Super Admin'))
                                return false;
                            else
                                return true;
                        })
                        ->label('Send Verification Link')
                        ->requiresConfirmation()
                        ->action(function (User $user) {
                            $user->sendEmailVerificationNotification();
                        }),
                ])
                    ->tooltip('Actions')
            ], position: ActionsPosition::AfterColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->hidden(function (): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasPermissionTo('delete User'))
                                return false;
                            else
                                return true;
                        }),
                    ExportBulkAction::make()
                ]),
            ])
            ->defaultPaginationPageOption(25)
            ->emptyStateHeading('No user found')
            ->emptyStateDescription('User list will appear here.');
    }

    public static function getRelations(): array
    {
        return [
            AuthenticationLogsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'activities' => Pages\ListUserActivities::route('/{record}/activities'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
