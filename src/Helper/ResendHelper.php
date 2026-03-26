<?php

namespace App\Helper;

use Resend\Client;
use Resend;

class ResendHelper
{
    private string $RESEND_TOKEN = 're_PBCpY1uq_4UqSt22ECeeJWHWotUBCs7Ai';
    private Client $resend;

    public function __construct()
    {
        $this->resend = Resend::client($this->RESEND_TOKEN);
    }

    public function send(string $to, string $subject, string $html): void
    {
        $this->resend->emails->send([
            'from' => 'noreply@syhtam.fr',
            'to' => $to,
            'subject' => $subject,
            'html' => $html
        ]);
    }
}
