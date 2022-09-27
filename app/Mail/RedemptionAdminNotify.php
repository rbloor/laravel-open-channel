<?php

namespace App\Mail;

use App\Models\Redemption;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RedemptionAdminNotify extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public Redemption $redemption;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Redemption $redemption)
    {
        $this->user = $redemption->user;
        $this->redemption = $redemption;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Admin Points Redemption Request')->markdown('emails.redemption-admin-notify');
    }
}
