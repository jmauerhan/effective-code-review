<?php

namespace Src;

use Mandrill;

Class App
{
    private $from    = 'app@example.com';
    private $subject = 'Welcome to the App!';
    private $message = 'This is a welcome email!';
    private $apiKey  = 'C0wG3h1A5Fs5xNoLdM2S0w';
    private $mailer;

    public function __construct()
    {
        $this->mailer = new Mandrill($this->apiKey);
    }

    public function email($to)
    {
        /** Build an email array */
        $email = [
            'to'         => [['email' => $to]],
            'from_email' => $this->from,
            'subject'    => $this->subject,
        ];
        $this->mailer->messages->send($email);


        return true;
    }
}


