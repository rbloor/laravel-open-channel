<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.redemption.index');
    }
}
