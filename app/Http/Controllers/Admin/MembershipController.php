<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Contracts\View\View;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Membership::class, 'membership');
    }

    public function index(): View
    {
        return view('admin.membership.index');
    }
}
