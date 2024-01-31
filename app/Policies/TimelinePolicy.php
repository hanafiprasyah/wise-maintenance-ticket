<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Timeline;
use App\Models\User;

class TimelinePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Timeline');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Timeline $timeline): bool
    {
        return $user->checkPermissionTo('view Timeline');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Timeline');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Timeline $timeline): bool
    {
        return $user->checkPermissionTo('update Timeline');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Timeline $timeline): bool
    {
        return $user->checkPermissionTo('delete Timeline');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Timeline $timeline): bool
    {
        return $user->checkPermissionTo('restore Timeline');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Timeline $timeline): bool
    {
        return $user->checkPermissionTo('force-delete Timeline');
    }
}
