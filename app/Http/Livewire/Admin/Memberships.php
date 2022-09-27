<?php

namespace App\Http\Livewire\Admin;

use App\Mail\SignupApproval;
use App\Mail\SignupRejection;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class Memberships extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $totalCount, $approvedCount, $rejectedCount, $pendingCount;
    public $showModal = false;
    public $showMembership;

    public $filter = [
        'company' => '',
        'status' => '',
    ];

    public function mount()
    {
        $memberships = Membership::with('user')->get();

        $this->totalCount = $memberships->count();
        $this->pendingCount = $memberships->sum(function ($value) {
            return $value->user()->pending()->count();
        });
        $this->approvedCount = $memberships->sum(function ($value) {
            return $value->user()->approved()->count();
        });
        $this->rejectedCount = $memberships->sum(function ($value) {
            return $value->user()->rejected()->count();
        });
    }

    public function render()
    {
        $this->authorize('viewAny', Membership::class);

        $memberships = Membership::with('user');

        $memberships->when($this->filter['status'], function ($query) {
            $query->whereHas('user', function ($user) {
                $user->{$this->filter['status']}();
            });
        });

        $memberships->when($this->filter['company'], function ($query) {
            $query->whereHas('company', function ($company) {
                $company->where('id', $this->filter['company']);
            });
        });

        $memberships = $memberships->paginate(8);

        return view('livewire.admin.memberships', compact('memberships'));
    }

    public function approve(Membership $membership)
    {
        $this->authorize('approve', $membership);

        $user = User::find($membership->user->id);

        $user->update(['approved_at' => now()]);

        Mail::to($user->email)->send(new SignupApproval($user));
    }

    public function reject(Membership $membership)
    {
        $this->authorize('reject', $membership);

        $user = User::find($membership->user->id);

        $user->update(['rejected_at' => now()]);

        Mail::to($user->email)->send(new SignupRejection($user));
    }

    public function show(Membership $membership)
    {
        $this->authorize('view', $membership);

        $this->showMembership = $membership;

        $this->showModal = true;
    }
}
