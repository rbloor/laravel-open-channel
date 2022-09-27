<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductCategoryRequest;
use App\Http\Requests\Admin\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProductCategory::class, 'product_category');
    }

    public function index(): View
    {
        $productCategories = ProductCategory::paginate(8);

        return view('admin.product_category.index', compact('productCategories'));
    }

    public function create(): View
    {
        return view('admin.product_category.create');
    }

    public function store(StoreProductCategoryRequest $request): RedirectResponse
    {
        $productCategory = ProductCategory::create($request->validated());

        if ($request->hasFile('filename')) {
            $request->filename->store('categories', 'public');
            $productCategory->filename = $request->filename->hashName();
            $productCategory->save();
        }

        return redirect()
            ->route('admin.product_category.index')
            ->with('message', 'Record has been created');
    }

    public function edit(ProductCategory $productCategory): View
    {
        return view('admin.product_category.edit', compact('productCategory'));
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory): RedirectResponse
    {
        $productCategory->update($request->validated());

        if ($request->hasFile('filename')) {
            if (!empty($productCategory->filename)) {
                if (Storage::disk('public')->exists("category/" . $productCategory->filename)) {
                    Storage::disk('public')->delete("category/" . $productCategory->filename);
                }
            }
            $request->filename->store('categories', 'public');
            $productCategory->filename = $request->filename->hashName();
            $productCategory->save();
        }

        return redirect()
            ->route('admin.product_category.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(ProductCategory $productCategory): RedirectResponse
    {
        if (!empty($productCategory->filename)) {
            if (Storage::disk('public')->exists("category/" . $productCategory->filename)) {
                Storage::disk('public')->delete("category/" . $productCategory->filename);
            }
        }

        $productCategory->delete();

        return redirect()
            ->route('admin.product_category.index')
            ->with('message', 'Record has been deleted');
    }
}
