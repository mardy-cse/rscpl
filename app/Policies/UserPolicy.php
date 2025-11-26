<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can manage the application.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function manageApp(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view admin dashboard.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewDashboard(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create records.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update records.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function update(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete records.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function delete(User $user): bool
    {
        return $user->isAdmin();
    }
}
