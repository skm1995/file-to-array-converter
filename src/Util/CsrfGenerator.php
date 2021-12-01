<?php

namespace App\Util;

class CsrfGenerator
{
    /**
     * @throws \Exception
     */
    public static function generate(string $intention): string
    {
        return $_SESSION['csrfToken'][$intention] = bin2hex(random_bytes(32));
    }
}
