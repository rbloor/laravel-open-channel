<?php

namespace App\Http\Livewire\Admin;

use App\Mail\SaleApproval;
use App\Mail\SaleRejection;
use App\Models\Sale;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class Sales extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $filter = [
        'status' => ''
    ];
    public $showModal = false;
    public $showSale;

    public function render()
    {
        $this->authorize('viewAny', Sale::class);

        $sales = Sale::when($this->filter['status'], function ($query) {
            $query->{$this->filter['status']}();
        })->paginate(8);

        $allSales = Sale::all();

        return view('livewire.admin.sales', compact('sales', 'allSales'));
    }

    public function approve(Sale $sale)
    {
        $this->authorize('approve', $sale);

        $sale->update(['approved_at' => now()]);

        Mail::to($sale->user->email)->send(new SaleApproval($sale));
    }

    public function reject(Sale $sale)
    {
        $this->authorize('reject', $sale);

        $sale->update(['rejected_at' => now()]);

        Mail::to($sale->user->email)->send(new SaleRejection($sale));
    }

    public function show(Sale $sale)
    {
        $this->authorize('view', $sale);

        $this->showSale = $sale;

        $this->showModal = true;
    }
}
