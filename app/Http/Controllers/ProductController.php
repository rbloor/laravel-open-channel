<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    public function index(Request $request): View
    {
        $products = Product::query();

        $products = $products->when(request('product_category_id'), function ($query) {
            $query->where('product_category_id', request('product_category_id'));
        });

        $products->when($request->has('search'), function ($query) {
            return $query->whereLike([
                'name',
                'description',
                'code',
                'uuid',
                'product_category.name'
            ], request('search', ''));
        });

        $products = $products->latest()->paginate(9);

        $productCategories = ProductCategory::whereHas('products')->get();

        return view('user.product.index', compact('products', 'productCategories'));
    }
}
