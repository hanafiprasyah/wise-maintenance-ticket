<?php

namespace App\Filament\Resources\BudgetResource\Pages;

use App\Models\User;
use Filament\Actions;
use App\Models\Budget;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\BudgetResource;
use Filament\Notifications\Actions\Action;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditBudget extends EditRecord
{
    use UsesResourceLock;

    protected static string $resource = BudgetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterValidate(): void
    {
        // Runs after the form fields are validated when the form is submitted.
        Budget::where('id', $this->record->id)
            ->update(['status' => 'Pending']);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['item_subtotal'] = $data['subtotal'] - $data['transport'];

        return $data;
    }

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        Notification::make()
            ->title('Proposal has been revised for ticket: ' . $this->record->maintenance->ticket . '')
            ->warning()
            ->body('Please check the completeness of the data and correct the prices offered by our helpdesk correctly!')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.wise.resources.budgets.index')),
            ])
            ->sendToDatabase(User::where('level', 'Super Admin')->orWhere('level', 'DACSO')->get());
    }
}
