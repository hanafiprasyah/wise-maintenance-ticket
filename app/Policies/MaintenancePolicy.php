<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Maintenance;
use App\Models\User;

class MaintenancePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Maintenance');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Maintenance $maintenance): bool
    {
        return $user->checkPermissionTo('view Maintenance');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Maintenance');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Maintenance $maintenance): bool
    {
        return $user->checkPermissionTo('update Maintenance');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Maintenance $maintenance): bool
    {
        return $user->checkPermissionTo('delete Maintenance');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Maintenance $maintenance): bool
    {
        return $user->checkPermissionTo('restore Maintenance');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Maintenance $maintenance): bool
    {
        return $user->checkPermissionTo('force-delete Maintenance');
    }

    // Mark as Done permission
    public function markAsDoneView(User $user, Maintenance $maintenance): bool
    {
        return $user->checkPermissionTo('mark-as-done Maintenance');
    }

    // Close ticket permission
    public function updateCloseTicket(User $user, Maintenance $maintenance): bool
    {
        return $user->checkPermissionTo('update-close-ticket Maintenance');
    }
}
