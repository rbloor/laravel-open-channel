<?php

namespace App\Http\Controllers;

use App\Facades\BasketFacade;
use App\Facades\CheckoutFacade;
use App\Http\Requests\StoreCheckoutRequest;
use App\Mail\RedemptionAdminNotify;
use App\Models\Redemption;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index(): View
    {
        $basket = BasketFacade::get();
        $total = BasketFacade::total();
        $requires_shipping = collect($basket)->sum('is_physical') > 0;
        return view('user.checkout.index', compact('basket', 'total', 'requires_shipping'));
    }

    public function confirmation(string $order_number): View
    {
        $redemption = Redemption::where('order_number', $order_number)->first();
        return view('user.checkout.confirmation', compact('redemption'));
    }

    public function store(StoreCheckoutRequest $request): RedirectResponse
    {
        if (BasketFacade::total() > auth()->user()->membership->pointsBalance) {
            return redirect()->route('basket');
        }

        try {
            $redemption = CheckoutFacade::save(BasketFacade::get(), $request, auth()->user());
        } catch (\PDOException $e) {
            return redirect()->route('checkout.index')->with('error', 'There was an error submitting your order');
        }

        BasketFacade::clear();

        $order_number = $redemption->order_number;

        Mail::to(config('mail.to.admin'))->send(new RedemptionAdminNotify($redemption));

        return redirect()->route('checkout.confirmation', compact('order_number'));
    }
}
