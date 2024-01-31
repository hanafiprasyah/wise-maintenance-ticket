<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Enums\ActionsPosition;
use App\Filament\Resources\ProductResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $activeNavigationIcon = 'heroicon-s-cube';
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
        return 'Products';
    }

    public static function shouldRegisterNavigation(): bool
    {
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        if (Auth::user()->can('view-any Product'))
            return true;
        else
            return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Product Name')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record),
                Forms\Components\TextInput::make('codex')
                    ->label('Product Number')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record),
                Forms\Components\TextInput::make('spec')
                    ->label('Technical Specification')
                    ->required(),
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
                TextColumn::make('codex')
                    ->label('Product Number')
                    ->searchable()
                    ->visible(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->hasRole('Super Admin'))
                            return true;
                        else
                            return false;
                    }),
                TextColumn::make('name')
                    ->label('Product Name')
                    ->wrap()
                    ->copyable()
                    ->copyMessage('Product copied')
                    ->copyMessageDuration(1500),
                TextColumn::make('spec')
                    ->label('Technical Specification')
                    ->wrap()
                    ->copyable()
                    ->copyMessage('Specification copied')
                    ->copyMessageDuration(1500)
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make()
                        ->hidden(function (): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasRole('Super Admin')) {
                                return false;
                            } else {
                                return true;
                            }
                        }),
                ])
                    ->tooltip('Actions')
            ], position: ActionsPosition::AfterColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->hidden(function (): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasPermissionTo('delete Product'))
                                return false;
                            else
                                return true;
                        }),
                    ExportBulkAction::make()
                ]),
            ])
            ->defaultPaginationPageOption(25)
            ->emptyStateHeading('No products found')
            ->emptyStateDescription('Product list will appear here.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
