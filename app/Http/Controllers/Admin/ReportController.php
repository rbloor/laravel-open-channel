<?php

namespace App\Http\Controllers\Admin;

use App\Exports\MembershipsExport;
use App\Exports\RedemptionsExport;
use App\Exports\SalesExport;
use App\Exports\TransactionsExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportMemberships()
    {
        return Excel::download(new MembershipsExport, 'memberships.xlsx');
    }

    public function exportSales()
    {
        return Excel::download(new SalesExport, 'sales.xlsx');
    }

    public function exportRedemptions()
    {
        return Excel::download(new RedemptionsExport, 'redemptions.xlsx');
    }

    public function exportTransactions()
    {
        return Excel::download(new TransactionsExport, 'transactions.xlsx');
    }
}
