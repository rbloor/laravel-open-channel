<?php

namespace App\Http\Livewire\Admin;

use App\Exports\MembershipsExport;
use App\Exports\RedemptionsExport;
use App\Exports\SalesExport;
use App\Exports\TransactionsExport;
use App\Facades\BudgetFacade;
use App\Models\Membership;
use App\Models\Redemption;
use App\Models\Sale;
use App\Models\Setting;
use App\Models\Transaction;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Reporting extends Component
{
    public $filter = [
        'date_from' => '',
        'date_to' => '',
    ];

    public function render()
    {
        $this->filterMemberships();
        $this->filterSales();
        $this->filterRedemptions();
        $this->filterTransactions();

        return view('livewire.admin.reporting');
    }

    public function filterMemberships()
    {
        $membershipQuery = Membership::query();

        $membershipQuery->when($this->filter['date_from'], function ($query) {
            $query->whereDate('created_at', '>=', $this->filter['date_from']);
        });

        $membershipQuery->when($this->filter['date_to'], function ($query) {
            $query->whereDate('created_at', '<=', $this->filter['date_to']);
        });

        $memberships = $membershipQuery->get();

        $this->total_registrations = $memberships->count();
        $this->total_user_logins = $memberships->sum(function ($value) {
            return $value->user->login_count;
        });
        $this->total_optouts = Setting::where('setting_key', 'optout_count')->first()->setting_value;

        foreach ($membershipQuery->get() as $membership) {
            $budget_forecast[] = BudgetFacade::calculate($membership->pointsApprovedBalance, $membership->tax_region, $membership->tax_bracket);
        }
        $budget_forecast = collect($budget_forecast);

        $this->unredeemedGross = $budget_forecast->sum('gross');
        $this->unredeemedVat = $budget_forecast->sum('vat_payable');
        $this->unredeemedTax = $budget_forecast->sum('tax_payable');
        $this->unredeemedNi = $budget_forecast->sum('ni_payable');
        $this->unredeemedNet = $budget_forecast->sum('total_budget_allocation');
        $this->unredeemedGrossFormatted = '£' . number_format($this->unredeemedGross, 2);
        $this->unredeemedVatFormatted = '£' . number_format($this->unredeemedVat, 2);
        $this->unredeemedTaxFormatted = '£' . number_format($this->unredeemedTax, 2);
        $this->unredeemedNiFormatted = '£' . number_format($this->unredeemedNi, 2);
        $this->unredeemedNetFormatted = '£' . number_format($this->unredeemedNet, 2);
    }

    public function filterSales()
    {
        $saleQuery = Sale::query();

        $saleQuery->when($this->filter['date_from'], function ($query) {
            $query->whereDate('created_at', '>=', $this->filter['date_from']);
        });

        $saleQuery->when($this->filter['date_to'], function ($query) {
            $query->whereDate('created_at', '<=', $this->filter['date_to']);
        });

        $sales = $saleQuery->get();

        $this->totalSales = $sales->count();
        $this->pendingSales = $sales->whereNull('approved_at')->whereNull('rejected_at')->count();
        $this->approvedSales = $sales->whereNotNull('approved_at')->count();
        $this->rejectedSales = $sales->whereNotNull('rejected_at')->count();
        $this->pointsAwarded = $sales->whereNotNull('approved_at')->sum(function ($sale) {
            return $sale->points;
        });
        $this->bonusPointsAwarded = $sales->whereNotNull('approved_at')->sum(function ($sale) {
            return $sale->bonus_points;
        });
        $this->totalPointsAwarded = $sales->whereNotNull('approved_at')->sum(function ($sale) {
            return $sale->total_points;
        });
    }

    public function filterRedemptions()
    {
        $redemptionQuery = Redemption::query();

        $redemptionQuery->when($this->filter['date_from'], function ($query) {
            $query->whereDate('created_at', '>=', $this->filter['date_from']);
        });

        $redemptionQuery->when($this->filter['date_to'], function ($query) {
            $query->whereDate('created_at', '<=', $this->filter['date_to']);
        });

        $redemptions = $redemptionQuery->get();

        $this->totalRedemptions = $redemptions->count();
        $this->pendingRedemptions = $redemptions->whereNull('approved_at')->whereNull('rejected_at')->count();
        $this->approvedRedemptions = $redemptions->whereNotNull('approved_at')->count();
        $this->rejectedRedemptions = $redemptions->whereNotNull('rejected_at')->count();
        $this->totalPointsRedeemed = $redemptions->whereNotNull('approved_at')->sum('total_points');
        $this->totalPointsUnredeemed = $this->totalPointsAwarded - $this->totalPointsRedeemed;
        $this->redeemedGross = $redemptions->whereNotNull('approved_at')->sum('gross');
        $this->redeemedVat = $redemptions->whereNotNull('approved_at')->sum('vat');
        $this->redeemedTax = $redemptions->whereNotNull('approved_at')->sum('tax');
        $this->redeemedNi = $redemptions->whereNotNull('approved_at')->sum('ni');
        $this->redeemedNet = $redemptions->whereNotNull('approved_at')->sum('net');
        $this->redeemedGrossFormatted = '£' . number_format($this->redeemedGross, 2);
        $this->redeemedVatFormatted = '£' . number_format($this->redeemedVat, 2);
        $this->redeemedTaxFormatted = '£' . number_format($this->redeemedTax, 2);
        $this->redeemedNiFormatted = '£' . number_format($this->redeemedNi, 2);
        $this->redeemedNetFormatted = '£' . number_format($this->redeemedNet, 2);
    }

    public function filterTransactions()
    {
        $transactionQuery = Transaction::query();

        $transactionQuery->when($this->filter['date_from'], function ($query) {
            $query->whereDate('created_at', '>=', $this->filter['date_from']);
        });

        $transactionQuery->when($this->filter['date_to'], function ($query) {
            $query->whereDate('created_at', '<=', $this->filter['date_to']);
        });

        $transactions = $transactionQuery->get();

        $this->credit = $transactions->sum('credit');
        $this->debit = $transactions->sum('debit');
        $this->balance = $transactions->sum('credit') - $transactions->sum('debit');
        $this->creditFormatted = '£' . number_format($this->credit, 2);
        $this->debitFormatted = '£' . number_format($this->debit, 2);
        $this->balanceFormatted = '£' . number_format($this->balance, 2);
    }

    public function exportMemberships()
    {
        return Excel::download((new MembershipsExport())
                ->forDateFrom($this->filter['date_from'])
                ->forDateTo($this->filter['date_to']),
            'memberships.xlsx'
        );
    }

    public function exportSales()
    {
        return Excel::download((new SalesExport())
                ->forDateFrom($this->filter['date_from'])
                ->forDateTo($this->filter['date_to']),
            'sales.xlsx'
        );
    }

    public function exportRedemptions()
    {
        return Excel::download((new RedemptionsExport())
                ->forDateFrom($this->filter['date_from'])
                ->forDateTo($this->filter['date_to']),
            'redemptions.xlsx'
        );
    }

    public function exportTransactions()
    {
        return Excel::download((new TransactionsExport())
                ->forDateFrom($this->filter['date_from'])
                ->forDateTo($this->filter['date_to']),
            'transactions.xlsx'
        );
    }
}
