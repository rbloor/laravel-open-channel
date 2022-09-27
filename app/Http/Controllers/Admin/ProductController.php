<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    public function index(): View
    {
        $products = Product::paginate(8);

        return view('admin.product.index', compact('products'));
    }

    public function create(): View
    {
        $productCategories = ProductCategory::all();

        return view('admin.product.create', compact('productCategories'));
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = Product::create($request->validated());

        if ($request->hasFile('filename')) {
            $request->filename->store('products', 'public');
            $product->filename = $request->filename->hashName();
            $product->save();
        }

        return redirect()
            ->route('admin.product.index')
            ->with('message', 'Record has been created');
    }

    public function edit(Product $product): View
    {
        $productCategories = ProductCategory::withTrashed()->get();

        return view('admin.product.edit', compact('product', 'productCategories'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        if ($request->hasFile('filename')) {
            if (!empty($product->filename)) {
                if (Storage::disk('public')->exists("products/" . $product->filename)) {
                    Storage::disk('public')->delete("products/" . $product->filename);
                }
            }
            $request->filename->store('products', 'public');
            $product->filename = $request->filename->hashName();
            $product->save();
        }

        return redirect()
            ->route('admin.product.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if (!empty($product->filename)) {
            if (Storage::disk('public')->exists("products/" . $product->filename)) {
                Storage::disk('public')->delete("products/" . $product->filename);
            }
        }

        $product->delete();

        return redirect()
            ->route('admin.product.index')
            ->with('message', 'Record has been deleted');
    }
}
