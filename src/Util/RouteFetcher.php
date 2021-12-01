<?php

namespace App\Util;

use App\Factory\RouteFactory;
use App\Object\Route;

class RouteFetcher
{
    /** @var Route[] */
    public static array $routes = [];

    /**
     * Loads routes from json and creates them as objects.
     */
    public static function fetch()
    {
        $decodedJsonRoutes = json_decode(file_get_contents(__DIR__ . '/../../config/routes.json'), true) ?: [];
        $routeFactory = new RouteFactory();
        foreach ($decodedJsonRoutes as $decodedJsonRouteName => $decodedJsonRoute) {
            self::$routes[$decodedJsonRouteName] = $routeFactory->createRoute($decodedJsonRouteName, $decodedJsonRoute['path'], $decodedJsonRoute['controller'], $decodedJsonRoute['action']);
        }
    }
}
