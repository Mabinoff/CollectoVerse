<?php

namespace App\Helper;

class RegexHelper
{
    public static function checkEmail(string $email)
    {
        $result = preg_match(
            '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            $email
        );

        if (!$result || $result !== 1) {
            throw new \Exception('Adresse email invalid');
        }
    }
}

?>