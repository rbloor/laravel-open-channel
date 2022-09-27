<?php

namespace App\Http\Livewire\User;

use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Popup extends Component
{
    public $is_open = false;
    public $hasOffer = false;
    public $offer = null;

    public function mount()
    {
        if (Auth::check()) {
            $seenOffer = Cookie::get('auth_offer') === 'yes';
            $offers = Offer::where('is_published', 1)->where('is_public', 0)->get();
            $this->offer = $offers->isNotEmpty() ? $offers->random() : null;
        } else {
            $seenOffer = Cookie::get('public_offer') === 'yes';
            $offers = Offer::where('is_published', 1)->where('is_public', 1)->get();
            $this->offer = $offers->isNotEmpty() ? $offers->random() : null;
        }

        if ($seenOffer === false && $this->offer !== null) {
            $this->hasOffer = true;
        }
    }

    public function render()
    {
        return view('livewire.user.popup');
    }

    public function closeModal()
    {
        if (Auth::check()) {
            Cookie::queue('auth_offer', 'yes');
        } else {
            Cookie::queue('public_offer', 'yes');
        }
        $this->is_open = false;
    }
}
