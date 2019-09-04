<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $url;
    public $user;
    public $password;

    public function __construct($url, $user, $password)
    {
        $this->url = $url;
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        return $this->markdown('emails.verify')
            ->subject('Welcome to Android Makassar!');
    }
}
