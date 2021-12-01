<?php

const PSR4_NAMESPACES = [
    'App\\' => 'src/'
];

spl_autoload_register(function (string $class) {
    $prefix = strtok($class, '\\') . '\\';

    if (! array_key_exists($prefix, PSR4_NAMESPACES)) {
        return;
    }

    $baseDirectory = PSR4_NAMESPACES[$prefix];
    $relativeClass = ltrim($class, $prefix);
    $path = str_replace('\\', '/', $relativeClass) . '.php';

    require_once $baseDirectory . '/' . $path;
});
