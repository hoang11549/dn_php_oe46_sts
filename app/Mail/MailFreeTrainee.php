<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailFreeTrainee extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $email;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $email, $subject)
    {
        $this->data = $data;
        $this->email = $email;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('mail.traineeFree', ['data' => $this->data])
            ->subject($this->subject);
    }
}
