<?php

namespace App\Filament\Resources;

use App\Models\Item;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Enums\ActionsPosition;
use App\Filament\Resources\ItemResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $activeNavigationIcon = 'heroicon-s-rectangle-stack';
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
        return 'Items';
    }

    public static function shouldRegisterNavigation(): bool
    {
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        if (Auth::user()->can('view-any Item'))
            return true;
        else
            return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Item Name')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record),
                Forms\Components\Select::make('unit')
                    ->label('Item Unit')
                    ->options([
                        'Unit' => 'Unit',
                        'Lot' => 'Lot',
                        'Rod' => 'Rod',
                        'Pcs' => 'Pcs',
                        'Pack' => 'Pack',
                        'Metre' => 'Metre',
                        'Lot' => 'Lot',
                        'Dozen' => 'Dozen'
                    ])
                    ->placeholder('Select unit of the item')
                    ->selectablePlaceholder(false)
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('price_int')
                    ->label('Item Price')
                    ->required()
                    ->prefix('Rp. ')
                    ->currencyMask(thousandSeparator: ',', decimalSeparator: '.', precision: 2),
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
                    ->label('Item Name')
                    ->searchable(),
                TextColumn::make('price_int')
                    ->label('Item Price')
                    ->currency('IDR'),
                TextColumn::make('editor')
                    ->label('Editor'),
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
                            if (Auth::user()->hasPermissionTo('delete Item'))
                                return false;
                            else
                                return true;
                        }),
                    ExportBulkAction::make()
                ]),
            ])
            ->defaultPaginationPageOption(25)
            ->emptyStateHeading('No Item found')
            ->emptyStateDescription('Item list will appear here.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
