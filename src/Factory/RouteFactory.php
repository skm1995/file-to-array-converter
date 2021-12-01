<?php

namespace App\Factory;

use App\Object\Route;

class RouteFactory
{
    public function createRoute(string $name, string $path, string $controller, string $action): Route
    {
        $route = new Route();
        $route->setName($name);
        $route->setPath($path);
        $route->setController($controller);
        $route->setAction($action);

        return $route;
    }
}
