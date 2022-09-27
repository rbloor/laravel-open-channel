<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Mail\FeedbackAdminNotify;
use App\Models\Feedback;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Feedback::class, 'feedback');
    }

    public function create(): View
    {
        return view('user.feedback.create');
    }

    public function store(StoreFeedbackRequest $request): RedirectResponse
    {
        $Feedback = Feedback::create($request->validated() + ['user_id' => auth()->user()->id]);

        Mail::to(config('mail.to.admin'))->send(new FeedbackAdminNotify($Feedback));

        return redirect()->back()->with('success', 'Thank you for your feedback');
    }
}
