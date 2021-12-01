<?php

namespace App\Util;

use App\Exception\InvalidCsrfTokenException;

class CsrfValidator
{
    /**
     * @throws InvalidCsrfTokenException
     */
    public function validateToken(?string $token, string $intention): void
    {
        if (empty($token) || $token != $_SESSION['csrfToken'][$intention]) {
            throw new InvalidCsrfTokenException("Invalid csrf token.");
        }
    }
}
