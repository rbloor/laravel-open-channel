<?php

namespace App\Http\Livewire\User;

use App\Facades\BasketFacade;
use Livewire\Component;

class Basket extends Component
{
    public array $basket = [];
    public int $total = 0;
    public string $layout;

    protected $listeners = [
        'refreshBasket' => 'render'
    ];

    public function render()
    {
        $this->basket = BasketFacade::get();
        $this->total = BasketFacade::total();
        return view('livewire.user.basket');
    }

    public function removeFromBasket(int $id)
    {
        BasketFacade::remove($id);
        $this->emit('refreshBasketCount');
    }

    public function update(int $index)
    {
        BasketFacade::update($this->basket[$index]);
        $this->emit('refreshBasketCount');
    }
}
