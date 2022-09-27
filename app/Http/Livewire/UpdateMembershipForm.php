<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Actions\Fortify\UpdateMembershipInformation;
use App\Models\Company;

class UpdateMembershipForm extends Component
{
    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];
    public $companies = [];

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->state = Auth::user()->membership->toArray();
        $this->companies = Company::all();
    }

    /**
     * Update the user's membership information.
     *
     * @return void
     */
    public function updateMembershipInformation(UpdateMembershipInformation $updateMembership)
    {
        $this->resetErrorBag();
        $updateMembership->update(Auth::user()->membership, $this->state);
        $this->emit('saved');
    }


    public function render()
    {
        return view('profile.update-membership-form');
    }
}
