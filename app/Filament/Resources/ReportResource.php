<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Report;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Enums\ActionsPosition;
use App\Filament\Resources\ReportResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $activeNavigationIcon = 'heroicon-s-flag';
    protected static ?string $slug = 'feedback';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function getNavigationLabel(): string
    {
        return 'Feedback';
    }

    public static function getModelLabel(): string
    {
        return 'Feedback';
    }

    public static function shouldRegisterNavigation(): bool
    {
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        if (Auth::user()->can('view-any Report'))
            return true;
        else
            return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('content')
                    ->label('Tell us your problem')
                    ->required()
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
                        'codeBlock',
                    ])
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                        'link',
                        'orderedList',
                    ]),
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
                TextColumn::make('id')
                    ->label('UUID')
                    ->searchable()
                    ->visible(function (): bool {
                        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                        if (Auth::user()->hasRole('Super Admin'))
                            return true;
                        else
                            return false;
                    }),
                TextColumn::make('status')
                    ->badge()
                    ->searchable()
                    ->color(fn (string $state): string => match ($state) {
                        'Issues' => 'primary',
                        'Solved' => 'success',
                        default => 'gray'
                    }),
                TextColumn::make('content')
                    ->label('User Message')
                    ->wrap()
                    ->html()
                    ->copyable()
                    ->copyMessage('Copied')
                    ->copyMessageDuration(1000),
                TextColumn::make('user.name')
                    ->label('Reporter')
                    ->wrap(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    // Tables\Actions\EditAction::make(),
                    // Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Action::make('solved')
                        ->label('Solved')
                        ->icon('heroicon-m-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->hidden(function (Report $record): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if ($record->status == 'Solved' && Auth::user()->hasRole('Super Admin'))
                                return true;
                            else
                                return false;
                        })
                        ->action(function (Report $record): void {
                            $record->updateStatusSolved();
                        }),
                ])
                    ->tooltip('Actions')
            ], position: ActionsPosition::AfterColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->hidden(function (): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasPermissionTo('delete Report'))
                                return false;
                            else
                                return true;
                        }),
                    ExportBulkAction::make()
                        ->hidden(function (): bool {
                            /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
                            if (Auth::user()->hasPermissionTo('reorder Report'))
                                return false;
                            else
                                return true;
                        }),
                ]),
            ])
            ->defaultPaginationPageOption(25)
            ->emptyStateHeading('No feedback found')
            ->emptyStateDescription('Feedback list will appear here.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            // 'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
