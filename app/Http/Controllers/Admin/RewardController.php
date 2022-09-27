<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRewardRequest;
use App\Http\Requests\Admin\UpdateRewardRequest;
use App\Models\Reward;
use App\Models\RewardCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class RewardController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Reward::class, 'reward');
    }

    public function index(): View
    {
        $rewards = Reward::paginate(8);

        return view('admin.reward.index', compact('rewards'));
    }

    public function create(): View
    {
        $rewardCategories = RewardCategory::all();

        return view('admin.reward.create', compact('rewardCategories'));
    }

    public function store(StoreRewardRequest $request): RedirectResponse
    {
        $reward = Reward::create($request->validated());

        if ($request->hasFile('filename')) {
            $request->filename->store('rewards', 'public');
            $reward->filename = $request->filename->hashName();
            $reward->save();
        }

        return redirect()->route('admin.reward.index')->with('message', 'Record has been created');
    }

    public function edit(Reward $reward): View
    {
        $rewardCategories = RewardCategory::withTrashed()->get();

        return view('admin.reward.edit', compact('reward', 'rewardCategories'));
    }

    public function update(UpdateRewardRequest $request, Reward $reward): RedirectResponse
    {
        $reward->update($request->validated());

        if ($request->hasFile('filename')) {
            if (!empty($reward->filename)) {
                if (Storage::disk('public')->exists("rewards/" . $reward->filename)) {
                    Storage::disk('public')->delete("rewards/" . $reward->filename);
                }
            }
            $request->filename->store('rewards', 'public');
            $reward->filename = $request->filename->hashName();
            $reward->save();
        }

        return redirect()
            ->route('admin.reward.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(Reward $reward): RedirectResponse
    {
        if (!empty($reward->filename)) {
            if (Storage::disk('public')->exists("rewards/" . $reward->filename)) {
                Storage::disk('public')->delete("rewards/" . $reward->filename);
            }
        }

        $reward->delete();

        return redirect()
            ->route('admin.reward.index')
            ->with('message', 'Record has been deleted');
    }
}
