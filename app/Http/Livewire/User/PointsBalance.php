<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PointsBalance extends Component
{
    public int $pointsBalance;

    public function mount()
    {
        $this->pointsBalance = 0;
    }

    public function render()
    {
        $this->pointsBalance = Auth::User()->membership->points_balance;
        return view('livewire.user.points-balance');
    }
}
