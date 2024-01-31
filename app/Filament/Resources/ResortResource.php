<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Resort;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Enums\ActionsPosition;
use App\Filament\Resources\ResortResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ResortResource extends Resource
{
    protected static ?string $model = Resort::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $activeNavigationIcon = 'heroicon-s-building-office-2';
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
        return __('filament-panels::pages/resort.title');
    }

    public static function shouldRegisterNavigation(): bool
    {
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        if (Auth::user()->can('view-any Resort'))
            return true;
        else
            return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Resort Name (Polres)')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record),
                Forms\Components\TextInput::make('address')
                    ->label('Address')
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
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('address')
                    ->label('Address')
                    ->wrap()
                    ->icon('heroicon-s-map-pin')
                    ->iconPosition(IconPosition::Before)
                    ->iconColor('primary')
                    ->copyable()
                    ->copyMessage('Address copied')
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
                            if (Auth::user()->hasPermissionTo('delete Resort'))
                                return false;
                            else
                                return true;
                        }),
                    ExportBulkAction::make()
                ]),
            ])
            ->defaultPaginationPageOption(25)
            ->emptyStateHeading('No resort found')
            ->emptyStateDescription('Resort list will appear here.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResorts::route('/'),
            'create' => Pages\CreateResort::route('/create'),
            'edit' => Pages\EditResort::route('/{record}/edit'),
        ];
    }
}
