<?php

namespace App\Validator;

use App\Exception\ControllerMethodNotFoundException;
use App\Exception\ControllerNotFoundException;
use App\Exception\RouteNotFoundException;
use App\Object\Route;

class RouterValidator
{
    /**
     * @param Route|null $route
     * @throws RouteNotFoundException
     */
    public function validateIfRouteExists(?Route $route): void
    {
        if (! $route) {
            throw new RouteNotFoundException("Route not found.");
        }
    }

    /**
     * @throws ControllerMethodNotFoundException
     * @throws ControllerNotFoundException
     */
    public function validateController(Route $route, string $controllerClassName): void
    {
        if (! class_exists($controllerClassName)) {
            throw new ControllerNotFoundException("Controller $controllerClassName not found.");
        }
        if (! method_exists($controllerClassName, $route->getAction())) {
            throw new ControllerMethodNotFoundException("Controller $controllerClassName method {$route->getAction()} not found.");
        }
    }
}
