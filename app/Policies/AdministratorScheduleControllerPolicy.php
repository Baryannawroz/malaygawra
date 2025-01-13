<?php

namespace App\Policies;

use App\Models\User;
use App\Models\administratorScheduleController;
use Illuminate\Auth\Access\Response;

class AdministratorScheduleControllerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, administratorScheduleController $administratorScheduleController): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, administratorScheduleController $administratorScheduleController): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, administratorScheduleController $administratorScheduleController): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, administratorScheduleController $administratorScheduleController): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, administratorScheduleController $administratorScheduleController): bool
    {
        //
    }
}
