<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Problem;
use App\Models\User;

class ProblemPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Problem');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Problem $problem): bool
    {
        return $user->checkPermissionTo('view Problem');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Problem');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Problem $problem): bool
    {
        return $user->checkPermissionTo('update Problem');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Problem $problem): bool
    {
        return $user->checkPermissionTo('delete Problem');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Problem $problem): bool
    {
        return $user->checkPermissionTo('restore Problem');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Problem $problem): bool
    {
        return $user->checkPermissionTo('force-delete Problem');
    }
}
