<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The message instance.
     *
     * @var Message
     */
    public $page_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($page_data)
    {
        $this->page_data = $page_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.passwordchanged');
    }
}
