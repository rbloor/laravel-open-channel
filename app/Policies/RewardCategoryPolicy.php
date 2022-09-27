<?php

namespace App\Policies;

use App\Models\RewardCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RewardCategoryPolicy
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
        if ($user->can('view_reward_category')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RewardCategory  $rewardCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, RewardCategory $rewardCategory)
    {
        if ($user->can('view_reward_category')) {
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
        if ($user->can('create_reward_category')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RewardCategory  $rewardCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, RewardCategory $rewardCategory)
    {
        if ($user->can('edit_reward_category')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RewardCategory  $rewardCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, RewardCategory $rewardCategory)
    {
        if ($user->can('delete_reward_category')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RewardCategory  $rewardCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, RewardCategory $rewardCategory)
    {
        if ($user->can('restore_reward_category')) {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RewardCategory  $rewardCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, RewardCategory $rewardCategory)
    {
        if ($user->can('force_delete_reward_category')) {
            return true;
        }
    }
}
