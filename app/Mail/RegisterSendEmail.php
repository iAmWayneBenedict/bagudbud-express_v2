<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterSendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'bagudbudexpressph@gmail.com';
        $subject = 'Verify Email Address';
        $name = 'Bagudbud-Express';

        return $this->view('emailTemplate.email_register')
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'vkey' => $this->data['vkey'] ]);
    }
}
