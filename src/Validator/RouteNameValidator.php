<?php

namespace App\Validator;

use App\Exception\RouteNameNotFoundException;
use App\Object\Route;

class RouteNameValidator
{
    /**
     * @throws RouteNameNotFoundException
     */
    public function validateName(?Route $route, string $name)
    {
        if (! $route) {
            throw new RouteNameNotFoundException("Route for name: '$name' not found.");
        }
    }
}
