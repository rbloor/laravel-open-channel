<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductOfferRequest;
use App\Http\Requests\Admin\UpdateProductOfferRequest;
use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductOfferController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProductOffer::class, 'product_offer');
    }

    public function index(): View
    {
        $productOffers = ProductOffer::paginate(8);

        return view('admin.product_offer.index', compact('productOffers'));
    }

    public function create(): View
    {
        $products = Product::all();

        return view('admin.product_offer.create', compact('products'));
    }

    public function store(StoreProductOfferRequest $request): RedirectResponse
    {
        ProductOffer::create($request->validated());

        return redirect()
            ->route('admin.product_offer.index')
            ->with('message', 'Record has been created');
    }

    public function edit(ProductOffer $productOffer): View
    {
        $products = Product::withTrashed()->get();

        return view('admin.product_offer.edit', compact('productOffer', 'products'));
    }

    public function update(UpdateProductOfferRequest $request, ProductOffer $productOffer): RedirectResponse
    {
        $productOffer->update($request->validated());

        return redirect()
            ->route('admin.product_offer.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(ProductOffer $productOffer): RedirectResponse
    {
        $productOffer->delete();

        return redirect()
            ->route('admin.product_offer.index')
            ->with('message', 'Record has been deleted');
    }
}
