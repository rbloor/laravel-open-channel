<?php

namespace App\Policies;

use App\Models\Sale;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy
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
        if ($user->can('view_sale')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Sale $sale)
    {
        if ($user->can('view_sale')) {
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
        if ($user->can('create_sale')) {
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
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Sale $sale)
    {
        if ($user->can('edit_sale')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Sale $sale)
    {
        if ($user->can('delete_sale')) {
            if ($user->hasRole('user') && $user->id !== $sale->user_id) {
                return false;
            }
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Sale $sale)
    {
        if ($user->can('restore_sale')) {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Sale $sale)
    {
        if ($user->can('force_delete_sale')) {
            return true;
        }
    }

    /**
     * Determine whether the user can approve the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function approve(User $user, Sale $sale)
    {
        if ($user->can('approve_sale')) {
            return true;
        }
    }

    /**
     * Determine whether the user can reject the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reject(User $user, Sale $sale)
    {
        if ($user->can('approve_sale')) {
            return true;
        }
    }

    /**
     * Determine whether the user can bulk create modules
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function bulkCreate(User $user)
    {
        if ($user->can('bulk_create_sale')) {
            return true;
        }
    }
}
