<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSettingRequest;
use App\Http\Requests\Admin\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Setting::class, 'setting');
    }

    public function index(): View
    {
        $settings = Setting::paginate(8);

        return view('admin.tool.setting.index', compact('settings'));
    }

    public function create(): View
    {
        return view('admin.tool.setting.create');
    }

    public function store(StoreSettingRequest $request): RedirectResponse
    {
        Setting::create($request->validated());

        return redirect()
            ->route('admin.tool.setting.index')
            ->with('message', 'Record has been created');
    }

    public function edit(Setting $setting): View
    {
        return view('admin.tool.setting.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting): RedirectResponse
    {
        $setting->update($request->validated());

        return redirect()
            ->route('admin.tool.setting.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(Setting $setting): RedirectResponse
    {
        $setting->delete();

        return redirect()
            ->route('admin.tool.setting.index')
            ->with('message', 'Record has been deleted');
    }
}
