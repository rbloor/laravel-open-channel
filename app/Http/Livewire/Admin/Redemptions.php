<?php

namespace App\Http\Livewire\Admin;

use App\Facades\BudgetFacade;
use App\Mail\RedemptionApproval;
use App\Mail\RedemptionRejection;
use App\Models\Redemption;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class Redemptions extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $filter = [
        'status' => ''
    ];
    public $showModal = false;
    public $showRedemption;

    public function render()
    {
        $this->authorize('viewAny', Redemption::class);

        $redemptions = Redemption::when($this->filter['status'], function ($query) {
            $query->{$this->filter['status']}();
        })->paginate(8);

        $allRedemptions = Redemption::all();

        return view('livewire.admin.redemptions', compact('redemptions', 'allRedemptions'));
    }

    public function approve(Redemption $redemption)
    {
        $this->authorize('approve', $redemption);

        $budget = BudgetFacade::calculate(
            $redemption->total_points,
            $redemption->user->membership->tax_region,
            $redemption->user->membership->tax_bracket
        );

        $transaction = Transaction::create([
            'name' => 'Redemption',
            'debit' => $budget['total_budget_allocation']
        ]);

        $redemption->update([
            'gross' => $budget['gross'],
            'vat' => $budget['vat_payable'],
            'tax' => $budget['tax_payable'],
            'ni' => $budget['ni_payable'],
            'net' => $budget['total_budget_allocation'],
            'approved_at' => now(),
            'transaction_id' => $transaction->id
        ]);

        Mail::to($redemption->user->email)->send(new RedemptionApproval($redemption));
    }

    public function reject(Redemption $redemption)
    {
        $this->authorize('reject', $redemption);

        $redemption->update(['rejected_at' => now()]);

        Mail::to($redemption->user->email)->send(new RedemptionRejection($redemption));
    }

    public function show(Redemption $redemption)
    {
        $this->authorize('view', $redemption);

        $this->showRedemption = $redemption;

        $this->showModal = true;
    }
}
