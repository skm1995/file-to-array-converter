<?php

namespace App\Util;

use App\Controller\AbstractController;
use App\Exception\ControllerMethodNotFoundException;
use App\Exception\ControllerNotFoundException;
use App\Exception\RouteNotFoundException;
use App\Validator\RouterValidator;

class Router
{
    /**
     * Find controller and method for current request and call it.
     *
     * @throws ControllerMethodNotFoundException
     * @throws ControllerNotFoundException
     * @throws RouteNotFoundException
     */
    public function handleRequest()
    {
        $routerValidator = new RouterValidator();
        $routeFinder = new RouteFinder();

        $controllerReflectionClass = new \ReflectionClass(AbstractController::class);
        $route = $routeFinder->findByCurrentRequest();

        $routerValidator->validateIfRouteExists($route);

        $controllerNamespace = $controllerReflectionClass->getNamespaceName();
        $controllerClassName = "$controllerNamespace\\{$route->getController()}";

        $routerValidator->validateController($route, $controllerClassName);

        $controllerClass = new $controllerClassName;
        call_user_func([$controllerClass, $route->getAction()]);
    }
}
