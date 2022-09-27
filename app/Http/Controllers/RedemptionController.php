<?php

namespace App\Http\Controllers;

use App\Models\Redemption;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RedemptionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Redemption::class, 'redemption');
    }

    public function index(): View
    {
        $redemptions = Redemption::where('user_id', auth()->user()->id)->paginate(5);
        return view('user.redemption.index', compact('redemptions'));
    }

    public function destroy(Redemption $redemption): RedirectResponse
    {
        if ($redemption->status === 'pending') {
            $redemption->delete();
            return redirect()->route('redemption.index')->with('success', 'Your order has been deleted');
        }
        return redirect()->route('redemption.index');
    }
}
