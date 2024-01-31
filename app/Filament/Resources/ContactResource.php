<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Resort;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Cheesegrits\FilamentPhoneNumbers;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Enums\ActionsPosition;
use App\Filament\Resources\ContactResource\Pages;
use Awcodes\FilamentBadgeableColumn\Components\Badge;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Awcodes\FilamentBadgeableColumn\Components\BadgeableColumn;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $activeNavigationIcon = 'heroicon-s-book-open';
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
        return 'Contacts';
    }

    public static function shouldRegisterNavigation(): bool
    {
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        if (Auth::user()->can('view-any Contact'))
            return true;
        else
            return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_resort')
                    ->label('Resort')
                    ->options(Resort::all()->pluck('name', 'id'))
                    ->preload()
                    ->required()
                    ->searchable()
                    ->unique(ignorable: fn ($record) => $record)
                    ->validationMessages([
                        'required' => 'Please select the resort'
                    ]),
                Forms\Components\TextInput::make('name')
                    ->minLength(2)
                    ->maxLength(255)
                    ->required(),
                FilamentPhoneNumbers\Forms\Components\PhoneNumber::make('phone')
                    ->label('Phone number')
                    ->required()
                    ->prefix('+62')
                    ->mask('999 9999 99999')
                    ->displayFormat(FilamentPhoneNumbers\Enums\PhoneFormat::INTERNATIONAL)
                    ->databaseFormat(FilamentPhoneNumbers\Enums\PhoneFormat::INTERNATIONAL),
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
                BadgeableColumn::make('name')
                    ->label('PIC Name')
                    ->suffixBadges([
                        Badge::make('resort.name')
                            ->label(fn (Contact $record) => $record->resort->name)
                            ->color('purple'),
                    ]),
                FilamentPhoneNumbers\Columns\PhoneNumberColumn::make('phone')
                    ->displayFormat(FilamentPhoneNumbers\Enums\PhoneFormat::INTERNATIONAL)
                    ->region('ID')
                    ->badge()
                    ->color('lime')
                    ->dial(),
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
                            if (Auth::user()->hasPermissionTo('delete Contact'))
                                return false;
                            else
                                return true;
                        }),
                    ExportBulkAction::make()
                ]),
            ])
            ->defaultPaginationPageOption(25)
            ->emptyStateHeading('No contact found')
            ->emptyStateDescription('Contact list will appear here.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
