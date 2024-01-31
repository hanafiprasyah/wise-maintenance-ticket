<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Caused;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Enums\ActionsPosition;
use App\Filament\Resources\CausedResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class CausedResource extends Resource
{
    protected static ?string $model = Caused::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';
    protected static ?string $activeNavigationIcon = 'heroicon-s-exclamation-circle';
    protected static ?string $navigationGroup = 'Collection';

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
        return __('filament-panels::pages/caused.title');
    }

    public static function shouldRegisterNavigation(): bool
    {
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        if (Auth::user()->can('view-any Caused'))
            return true;
        else
            return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Caused Name')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record),
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
                TextColumn::make('codex')
                    ->label('Caused UUID')
                    ->searchable()
                    ->visible(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->hasRole('Super Admin'))
                            return true;
                        else
                            return false;
                    }),
                TextColumn::make('name')
                    ->label('Caused Name')
                    ->wrap()
                    ->copyable()
                    ->copyMessage('Caused copied')
                    ->copyMessageDuration(1500)
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                    ->tooltip('Actions')
            ], position: ActionsPosition::AfterColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->hidden(function (): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasPermissionTo('delete Caused'))
                                return false;
                            else
                                return true;
                        }),
                    ExportBulkAction::make()
                ]),
            ])
            ->defaultPaginationPageOption(25)
            ->emptyStateHeading('No caused found')
            ->emptyStateDescription('Caused list will appear here.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCauseds::route('/'),
            'create' => Pages\CreateCaused::route('/create'),
            'edit' => Pages\EditCaused::route('/{record}/edit'),
        ];
    }
}
