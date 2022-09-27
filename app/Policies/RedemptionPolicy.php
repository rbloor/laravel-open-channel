<?php

namespace App\Policies;

use App\Models\Redemption;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RedemptionPolicy
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
        if ($user->can('view_redemption')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Redemption  $redemption
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Redemption $redemption)
    {
        if ($user->can('view_redemption')) {
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
        if ($user->can('create_redemption')) {
            if ($user->hasRole('user') && is_null($user->approved_at)) {
                return false;
            }
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Redemption  $redemption
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Redemption $redemption)
    {
        if ($user->can('edit_redemption')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Redemption  $redemption
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Redemption $redemption)
    {
        if ($user->can('delete_redemption')) {
            if ($user->hasRole('user') && $user->id !== $redemption->user_id) {
                return false;
            }
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Redemption  $redemption
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Redemption $redemption)
    {
        if ($user->can('restore_redemption')) {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Redemption  $redemption
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Redemption $redemption)
    {
        if ($user->can('force_delete_redemption')) {
            return true;
        }
    }

    /**
     * Determine whether the user can approve the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Redemption  $redemption
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function approve(User $user, Redemption $redemption)
    {
        if ($user->can('approve_redemption')) {
            return true;
        }
    }

    /**
     * Determine whether the user can reject the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Redemption  $redemption
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reject(User $user, Redemption $redemption)
    {
        if ($user->can('approve_redemption')) {
            return true;
        }
    }
}
