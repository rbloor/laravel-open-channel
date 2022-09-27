<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRewardCategoryRequest;
use App\Http\Requests\Admin\UpdateRewardCategoryRequest;
use App\Models\RewardCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class RewardCategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(RewardCategory::class, 'reward_category');
    }

    public function index(): View
    {
        $rewardCategories = RewardCategory::paginate(8);

        return view('admin.reward_category.index', compact('rewardCategories'));
    }

    public function create(): View
    {
        return view('admin.reward_category.create');
    }

    public function store(StoreRewardCategoryRequest $request): RedirectResponse
    {
        $rewardCategory = RewardCategory::create($request->validated());

        if ($request->hasFile('filename')) {
            $request->filename->store('categories', 'public');
            $rewardCategory->filename = $request->filename->hashName();
            $rewardCategory->save();
        }

        return redirect()
            ->route('admin.reward_category.index')
            ->with('message', 'Record has been created');
    }

    public function edit(RewardCategory $rewardCategory): View
    {
        return view('admin.reward_category.edit', compact('rewardCategory'));
    }

    public function update(UpdateRewardCategoryRequest $request, RewardCategory $rewardCategory): RedirectResponse
    {
        $rewardCategory->update($request->validated());

        if ($request->hasFile('filename')) {
            if (!empty($rewardCategory->filename)) {
                if (Storage::disk('public')->exists("category/" . $rewardCategory->filename)) {
                    Storage::disk('public')->delete("category/" . $rewardCategory->filename);
                }
            }
            $request->filename->store('categories', 'public');
            $rewardCategory->filename = $request->filename->hashName();
            $rewardCategory->save();
        }

        return redirect()
            ->route('admin.reward_category.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(RewardCategory $rewardCategory): RedirectResponse
    {
        if (!empty($rewardCategory->filename)) {
            if (Storage::disk('public')->exists("category/" . $rewardCategory->filename)) {
                Storage::disk('public')->delete("category/" . $rewardCategory->filename);
            }
        }

        $rewardCategory->delete();

        return redirect()
            ->route('admin.reward_category.index')
            ->with('message', 'Record has been deleted');
    }
}
