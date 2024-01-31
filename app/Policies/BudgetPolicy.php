<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Budget;
use App\Models\User;

class BudgetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Budget');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Budget $budget): bool
    {
        return $user->checkPermissionTo('view Budget');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Budget');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Budget $budget): bool
    {
        return $user->checkPermissionTo('update Budget');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Budget $budget): bool
    {
        return $user->checkPermissionTo('delete Budget');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Budget $budget): bool
    {
        return $user->checkPermissionTo('restore Budget');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Budget $budget): bool
    {
        return $user->checkPermissionTo('force-delete Budget');
    }

    // Approve budget permission
    public function approveBudget(User $user, Budget $budget): bool
    {
        return $user->checkPermissionTo('approve Budget');
    }

    // Reject budget permission
    public function rejectBudget(User $user, Budget $budget): bool
    {
        return $user->checkPermissionTo('reject Budget');
    }

    // Pending budget permission
    public function pendingBudget(User $user, Budget $budget): bool
    {
        return $user->checkPermissionTo('pending Budget');
    }
}
