<?php

namespace App\Policies;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MembershipPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->can('view_membership')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Membership $membership)
    {
        if ($user->can('view_membership')) {
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->can('create_membership')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Membership $membership)
    {
        if ($user->can('edit_membership')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Membership $membership)
    {
        if ($user->can('delete_membership')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Membership $membership)
    {
        if ($user->can('restore_membership')) {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Membership $membership)
    {
        if ($user->can('force_delete_membership')) {
            return true;
        }
    }

    /**
     * Determine whether the user can approve the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function approve(User $user, Membership $membership)
    {
        if ($user->can('approve_membership')) {
            return true;
        }
    }

    /**
     * Determine whether the user can reject the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reject(User $user, Membership $membership)
    {
        if ($user->can('reject_membership')) {
            return true;
        }
    }
}
