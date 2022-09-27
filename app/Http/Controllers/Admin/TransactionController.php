<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTransactionRequest;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Transaction::class, 'transaction');
    }

    public function index(): View
    {
        $transactions = Transaction::paginate(8);

        return view('admin.transaction.index', compact('transactions'));
    }

    public function create(): View
    {
        return view('admin.transaction.create');
    }

    public function store(StoreTransactionRequest $request): RedirectResponse
    {
        Transaction::create($request->validated());

        return redirect()
            ->route('admin.transaction.index')
            ->with('message', 'Record has been created');
    }
}
