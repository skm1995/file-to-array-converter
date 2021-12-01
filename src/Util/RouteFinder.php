<?php

namespace App\Util;

use App\Object\Route;

class RouteFinder
{
    /**
     * Find current route from request
     */
    public function findByCurrentRequest(): ?Route
    {
        foreach (RouteFetcher::$routes as $route) {
            if ($route->getPath() == $_SERVER['REQUEST_URI']) {
                return $route;
            }
        }
        return null;
    }
}
