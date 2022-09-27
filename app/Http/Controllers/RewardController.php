<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\RewardCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Reward::class, 'reward');
    }

    public function index(Request $request): View
    {
        $rewards = Reward::query();

        $rewards = $rewards->when(request('reward_category_id'), function ($query) {
            $query->where('reward_category_id', request('reward_category_id'));
        });

        $rewards->when($request->has('search'), function ($query) {
            return $query->whereLike([
                'name',
                'description',
                'reward_category.name'
            ], request('search', ''));
        });

        $rewards = $rewards->orderBy('name', 'asc')->paginate(9);

        $rewardCategories = RewardCategory::whereHas('rewards')->get();

        return view('user.reward.index', compact('rewards', 'rewardCategories'));
    }
}
