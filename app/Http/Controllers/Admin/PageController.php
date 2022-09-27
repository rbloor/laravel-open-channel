<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Page::class, 'page');
    }

    public function index(): View
    {
        $pages = Page::paginate(8);

        return view('admin.page.index', compact('pages'));
    }

    public function create(): View
    {
        return view('admin.page.create');
    }

    public function store(StorePageRequest $request): RedirectResponse
    {
        $page = Page::create($request->validated());

        if ($request->hasFile('filename')) {
            $request->filename->store('pages', 'public');
            $page->filename = $request->filename->hashName();
            $page->save();
        }

        return redirect()
            ->route('admin.page.index')
            ->with('message', 'Record has been created');
    }

    public function edit(Page $page): View
    {
        return view('admin.page.edit', compact('page'));
    }

    public function update(UpdatePageRequest $request, Page $page): RedirectResponse
    {
        $page->update($request->validated());

        if ($request->hasFile('filename')) {
            if (!empty($page->filename)) {
                if (Storage::disk('public')->exists("pages/" . $page->filename)) {
                    Storage::disk('public')->delete("pages/" . $page->filename);
                }
            }
            $request->filename->store('pages', 'public');
            $page->filename = $request->filename->hashName();
            $page->save();
        }

        return redirect()
            ->route('admin.page.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(Page $page): RedirectResponse
    {
        if (!empty($page->filename)) {
            if (Storage::disk('public')->exists("pages/" . $page->filename)) {
                Storage::disk('public')->delete("pages/" . $page->filename);
            }
        }

        $page->delete();

        return redirect()
            ->route('admin.page.index')
            ->with('message', 'Record has been deleted');
    }
}
