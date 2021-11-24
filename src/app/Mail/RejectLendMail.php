<?php

namespace App\Mail;

use App\Models\Lend;
use App\Models\PendingLend;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RejectLendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lend;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PendingLend $lend)
    {
        $this->lend = $lend;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Votre demande de réservation')
            ->view('emails.rejectLends');
    }
}
