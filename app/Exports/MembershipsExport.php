<?php

namespace App\Exports;

use App\Models\Membership;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MembershipsExport implements FromView, ShouldAutoSize
{
    public $dateFrom = '';
    public $dateTo = '';

    public function forDateFrom(string $dateFrom)
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    public function forDateTo(string $dateTo)
    {
        $this->dateTo = $dateTo;
        return $this;
    }

    public function view(): View
    {
        $query = Membership::query();

        $query->when($this->dateFrom, function ($q) {
            $q->whereDate('created_at', '>=', $this->dateFrom);
        });

        $query->when($this->dateTo, function ($q) {
            $q->whereDate('created_at', '<=', $this->dateTo);
        });

        return view('exports.memberships', [
            'memberships' => $query->get()
        ]);
    }
}
