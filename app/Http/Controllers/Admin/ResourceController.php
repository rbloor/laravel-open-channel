<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreResourceRequest;
use App\Http\Requests\Admin\UpdateResourceRequest;
use App\Models\Resource;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Resource::class, 'resource');
    }

    public function index(): View
    {
        $resources = Resource::paginate(8);

        return view('admin.resource.index', compact('resources'));
    }

    public function create(): View
    {
        return view('admin.resource.create');
    }

    public function store(StoreResourceRequest $request): RedirectResponse
    {
        $resource = Resource::create($request->validated());

        if ($request->hasFile('filename')) {
            $request->filename->store('resources', 'public');
            $resource->filename = $request->filename->hashName();
            $resource->save();
        }

        if ($request->hasFile('download')) {
            $request->download->store('resources', 'public');
            $resource->download = $request->download->hashName();
            $resource->save();
        }

        return redirect()
            ->route('admin.resource.index')
            ->with('message', 'Record has been created');
    }

    public function edit(Resource $resource): View
    {
        return view('admin.resource.edit', compact('resource'));
    }

    public function update(UpdateResourceRequest $request, Resource $resource): RedirectResponse
    {
        $resource->update($request->validated());

        if ($request->hasFile('filename')) {
            if (!empty($resource->filename)) {
                if (Storage::disk('public')->exists("resources/" . $resource->filename)) {
                    Storage::disk('public')->delete("resources/" . $resource->filename);
                }
            }
            $request->filename->store('resources', 'public');
            $resource->filename = $request->filename->hashName();
            $resource->save();
        }

        if ($request->hasFile('download')) {
            if (!empty($resource->download)) {
                if (Storage::disk('public')->exists("resources/" . $resource->download)) {
                    Storage::disk('public')->delete("resources/" . $resource->download);
                }
            }
            $request->download->store('resources', 'public');
            $resource->download = $request->download->hashName();
            $resource->save();
        }

        return redirect()
            ->route('admin.resource.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(Resource $resource): RedirectResponse
    {
        if (!empty($resource->filename)) {
            if (Storage::disk('public')->exists("resources/" . $resource->filename)) {
                Storage::disk('public')->delete("resources/" . $resource->filename);
            }
        }

        if (!empty($resource->download)) {
            if (Storage::disk('public')->exists("resources/" . $resource->download)) {
                Storage::disk('public')->delete("resources/" . $resource->download);
            }
        }

        $resource->delete();

        return redirect()
            ->route('admin.resource.index')
            ->with('message', 'Record has been deleted');
    }
}
