<?php

namespace App\Policies;

use App\Models\ProductOffer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductOfferPolicy
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
        if ($user->can('view_product_offer')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ProductOffer $productOffer)
    {
        if ($user->can('view_product_offer')) {
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
        if ($user->can('create_product_offer')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProductOffer $productOffer)
    {
        if ($user->can('edit_product_offer')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ProductOffer $productOffer)
    {
        if ($user->can('delete_product_offer')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ProductOffer $productOffer)
    {
        if ($user->can('restore_product_offer')) {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ProductOffer $productOffer)
    {
        if ($user->can('force_delete_product_offer')) {
            return true;
        }
    }
}
