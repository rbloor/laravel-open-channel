<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class BasketModal extends Component
{
    public bool $showModal = false;

    protected $listeners = [
        'showBasketModal' => 'showModal'
    ];

    public function render()
    {
        return view('livewire.user.basket-modal');
    }

    public function showModal()
    {
        $this->showModal = true;
        $this->emit('refreshBasket');
    }
}
