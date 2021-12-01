<?php

namespace App\Util;

use App\Exception\RouteNameNotFoundException;
use App\Validator\RouteNameValidator;

class RoutePathFinder
{
    /**
     * Find route by its name.
     *
     * @throws RouteNameNotFoundException
     */
    public static function findByName(string $name): string
    {
        $validator = new RouteNameValidator();
        $route = RouteFetcher::$routes[$name] ?? null;
        $validator->validateName($route, $name);

        return $route->getPath();
    }
}
