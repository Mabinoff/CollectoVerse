<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Routes/Routes.php';
require_once __DIR__ . '/src/Core/DependencyInjection.php';

use App\Core\Router;

session_start();

try {
    $router = new Router();
    $router->route($routes, $_SERVER['REQUEST_URI'], $availablesDependencies);
} catch (Exception $e) {
    if ($e->getCode() === 404) {
        require './views/errors/404.php';
    } else if ($e->getCode() === 403) {
        require './views/errors/403.php';
    }
}

?>