<?php

namespace App\Http\Livewire\Admin;

use App\Facades\BudgetFacade;
use App\Models\CompanyCategory;
use App\Models\Membership;
use App\Models\Redemption;
use App\Models\Sale;
use App\Models\Transaction;
use Livewire\Component;

class Dashboard extends Component
{
    public $filter = [
        'date_from' => '',
        'date_to' => '',
    ];

    public function render()
    {
        $companyCategories = CompanyCategory::all();
        $memberships = Membership::query();
        $redemptions = Redemption::query();
        $transactions = Transaction::query();
        $sales = Sale::query();

        $memberships->when($this->filter['date_from'], function ($query) {
            $query->whereDate('created_at', '>=', $this->filter['date_from']);
        });

        $memberships->when($this->filter['date_to'], function ($query) {
            $query->whereDate('created_at', '<=', $this->filter['date_to']);
        });

        $sales->when($this->filter['date_from'], function ($query) {
            $query->whereDate('created_at', '>=', $this->filter['date_from']);
        });

        $sales->when($this->filter['date_to'], function ($query) {
            $query->whereDate('created_at', '<=', $this->filter['date_to']);
        });

        $redemptions->when($this->filter['date_from'], function ($query) {
            $query->whereDate('created_at', '>=', $this->filter['date_from']);
        });

        $redemptions->when($this->filter['date_to'], function ($query) {
            $query->whereDate('created_at', '<=', $this->filter['date_to']);
        });

        $transactions->when($this->filter['date_from'], function ($query) {
            $query->whereDate('created_at', '>=', $this->filter['date_from']);
        });

        $transactions->when($this->filter['date_to'], function ($query) {
            $query->whereDate('created_at', '<=', $this->filter['date_to']);
        });

        $sales = $sales->get();
        $memberships = $memberships->get();
        $redemptions = $redemptions->get();
        $transactions = $transactions->get();

        $this->approvedMemberships = $memberships->sum(function ($value) {
            return $value->user()->approved()->count();
        });
        $this->pendingMemberships = $memberships->sum(function ($value) {
            return $value->user()->pending()->count();
        });
        $this->rejectedMemberships = $memberships->sum(function ($value) {
            return $value->user()->rejected()->count();
        });

        $this->approvedSales = $sales->whereNotNull('approved_at')->count();
        $this->pendingSales = $sales->whereNull('approved_at')->whereNull('rejected_at')->count();
        $this->rejectedSales = $sales->whereNotNull('rejected_at')->count();

        $this->pointsAwarded = $sales->whereNotNull('approved_at')->sum(function ($sale) {
            return $sale->total_points;
        });
        $this->pointsRedeemed = $redemptions->whereNotNull('approved_at')->sum(function ($redemptions) {
            return $redemptions->total_points;
        });
        $this->pointsUnredeemed = $this->pointsAwarded - $this->pointsRedeemed;

        foreach (Membership::all() as $membership) {
            $budget_forecast[] = BudgetFacade::calculate($membership->pointsApprovedBalance, $membership->tax_region, $membership->tax_bracket);
        }
        $budget_forecast = collect($budget_forecast);

        $this->budgetTotal = '£' . number_format($transactions->sum('credit'), 2);
        $this->budgetUsed = '£' . number_format($transactions->sum('debit'), 2);
        $this->budgetRemaining = '£' . number_format($transactions->sum('credit') - $transactions->sum('debit'), 2);
        $this->netBudgetRemaining = '£' . number_format($transactions->sum('credit') - $transactions->sum('debit') - $budget_forecast->sum('total_budget_allocation'), 2);

        return view('livewire.admin.dashboard', compact('companyCategories', 'memberships', 'sales', 'transactions'));
    }
}
