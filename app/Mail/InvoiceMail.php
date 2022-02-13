<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice, $user, $invoice_link)
    {
        $this->invoice = $invoice;
        $this->user = $user;
        $this->invoice_link = $invoice_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.invoice', [
            'invoice' => $this->invoice,
            'user' => $this->user,
            'invoice_link' => $this->invoice_link
        ])->subject("An Invoice from " . env('APP_NAME') . "!");
    }
}
