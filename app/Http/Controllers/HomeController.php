<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Resource;
use App\Models\Setting;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $productCategories = ProductCategory::where('is_published', 1)
            ->latest()
            ->limit(4)
            ->get();

        $resources = Resource::where('is_published', 1)
            ->latest()
            ->limit(3)
            ->get();

        return view('user.dashboard', compact('resources', 'productCategories'));
    }
}
