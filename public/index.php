<?php

use App\Exception\NotFoundException;
use App\Util\RouteFetcher;
use App\Util\Router;

require_once __DIR__ . '/../autoloader.php';

try {
    session_start();
    RouteFetcher::fetch();
    $router = new Router();
    $router->handleRequest();
} catch (NotFoundException $e) {
    http_response_code(404);
} catch (\Exception $e) {
    http_response_code(500);
}
if (isset($e)) {
    echo $e->getMessage();
}
