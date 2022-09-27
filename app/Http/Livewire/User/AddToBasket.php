<?php

namespace App\Http\Livewire\User;

use App\Facades\BasketFacade;
use App\Models\Reward;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddToBasket extends Component
{
    public Reward $reward;

    public function render(): View
    {
        return view('livewire.user.add-to-basket');
    }

    public function addToBasket(): void
    {
        BasketFacade::add([
            'id' => $this->reward->id,
            'name' => $this->reward->name,
            'points' => $this->reward->points,
            'is_physical' => $this->reward->is_physical,
            'category' => $this->reward->reward_category->name,
            'filename' => $this->reward->filename,
            'quantity' => 1
        ]);

        $this->emit('refreshBasketCount');
        $this->emit('showBasketModal');
    }
}
