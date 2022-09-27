<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Mail\SaleAdminNotify;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Sale::class, 'sale');
    }

    public function index(): View
    {
        $sales = Sale::where('user_id', auth()->user()->id)->latest()->paginate(5);
        return view('user.sale.index', compact('sales'));
    }

    public function create(): View
    {
        $products = Product::all();
        return view('user.sale.create', compact('products'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'numeric', 'exists:products,id'],
            'quantity' => ['required', 'integer'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'sold_at' => ['required', 'date'],
            'invoiced_at' => ['required', 'date'],
        ]);

        $product = Product::find($request->get('product_id'));

        $extra = [
            'user_id' => auth()->user()->id,
            'points' => $product->points * $request->get('quantity'),
            'bonus_points' => $product->bonus_points * $request->get('quantity'),
        ];

        $sale = Sale::create($validated + $extra);

        Mail::to(config('mail.to.admin'))->send(new SaleAdminNotify($sale));

        return redirect()->route('sale.index')->with('success', 'Your sale has been created');
    }

    public function destroy(Sale $sale): RedirectResponse
    {
        if ($sale->status === 'pending') {
            $sale->delete();
            return redirect()->route('sale.index')->with('success', 'Your sale has been deleted');
        }
        return redirect()->route('sale.index');
    }
}
