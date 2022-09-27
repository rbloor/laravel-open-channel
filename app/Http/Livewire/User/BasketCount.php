<?php

namespace App\Http\Livewire\User;

use App\Facades\BasketFacade;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BasketCount extends Component
{
    public int $basketCount;

    protected $listeners = [
        'refreshBasketCount' => 'updateBasketTotal'
    ];

    public function mount(): void
    {
        $this->updateBasketTotal();
    }

    public function render(): View
    {
        return view('livewire.user.basket-count');
    }

    public function updateBasketTotal(): void
    {
        $this->basketCount = collect(BasketFacade::get())->sum('quantity');
    }
}
