<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Contracts\View\View;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Feedback::class, 'feedback');
    }

    public function index(): View
    {
        return view('admin.feedback.index');
    }
}
