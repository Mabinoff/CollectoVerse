<?php

namespace App\Service\Email;

use App\Helper\ResendHelper;
use Exception;

class ChangeEmailService
{
    private int $MIN_CODE = 111111;
    private int $MAX_CODE = 999999;

    private $data = [];

    public function __construct(
        private ResendHelper $resendHelper
    ) {}

    public function createRequest(string $email)
    {
        $code = rand($this->MIN_CODE, $this->MAX_CODE);

        $newData = [
            'email' => $email,
            'code' => $code,
            'retry' => 0
        ];

        $this->data[$email] = $newData;

        $html = <<<HTML
            <div style="font-family: Arial, sans-serif; text-align: center; padding: 20px;">
                <h1>Changement de votre adresse email</h1>
                <p>Voici votre code de confirmation :</p>
                <h2 style="font-size: 24px; color: #333;">{$code}</h2>
            </div>
        HTML;

        $this->resendHelper->send(
            $email,
            'Changement de votre adresse email',
            $html
        );
    }

    public function verifyRequest(string $email, int $code)
    {
        if (!isset($this->data[$email])) {
            throw new \Exception('Le code entré est invalide');
            return;
        }

        if (isset($this->data[$email])) {
            $request = $this->data[$email];
            if ($request->retry >= 3) {
                unset($this->data[$email]);
                return;
            }

            $request->retry++;

            if ($request->code == $code) {
                unset($this->data[$email]);
                return $this->data[$email];
            }
            throw new \Exception('Le code entré est invalide');
        }
    }
}

?>