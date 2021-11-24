<?php

namespace App\Mail;

use App\Models\Lend;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AcceptLendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lend;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lend $lend)
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
            ->view('emails.acceptLends');
    }
}
