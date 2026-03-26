<?php

namespace App\Service\Email;

use App\Helper\ResendHelper;
use Exception;

class ForgotPasswordEmailService
{
    private const MIN_CODE = 111111;
    private const MAX_CODE = 999999;
    private const MAX_RETRY = 3;

    public function __construct(
        private ResendHelper $resendHelper
    ) {
        if (!isset($_SESSION['forgot_password_requests'])) {
            $_SESSION['forgot_password_requests'] = [];
        }
    }

    public function createRequest(string $email): void
    {
        $code = random_int(self::MIN_CODE, self::MAX_CODE);

        $_SESSION['forgot_password_requests'][$email] = [
            'email' => $email,
            'code' => $code,
            'retry' => 0,
            'created' => time(),
        ];

        $html = <<<HTML
        <div style="font-family: Arial, sans-serif; text-align: center; padding: 20px;">
            <h1>Mot de passe oublié</h1>
            <p>Voici votre code de confirmation :</p>
            <h2 style="font-size: 24px; color: #333;">{$code}</h2>
        </div>
        HTML;

        $this->resendHelper->send(
            $email,
            'Mot de passe oublié',
            $html
        );
    }

    public function verifyRequest(string $email, int $code): array
    {
        if (!isset($_SESSION['forgot_password_requests'][$email])) {
            throw new Exception('Le code entré est invalide');
        }

        $request = &$_SESSION['forgot_password_requests'][$email];

        if ($request['retry'] >= self::MAX_RETRY) {
            unset($_SESSION['forgot_password_requests'][$email]);
            throw new Exception('Trop de tentatives, veuillez recommencer');
        }

        $request['retry']++;

        if ($request['code'] !== $code) {
            throw new Exception('Le code entré est invalide');
        }

        $result = $request;
        unset($_SESSION['forgot_password_requests'][$email]);

        return $result;
    }
}
