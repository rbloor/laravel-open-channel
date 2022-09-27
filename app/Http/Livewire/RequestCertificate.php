<?php

namespace App\Http\Livewire;

use App\Mail\CertificateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class RequestCertificate extends Component
{
    public function render()
    {
        return view('profile.request-certificate');
    }

    public function requestCertificate()
    {
        Mail::to(config('mail.to.admin'))->send(new CertificateRequest(Auth::user()));
        $this->emit('saved');
    }
}
