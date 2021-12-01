<?php

use App\Controller\TestController;

require_once __DIR__ . '/../autoloader.php';

$controller = new TestController();
$controller->testAction();
