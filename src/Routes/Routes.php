<?php

namespace App\Routes;

$routes = [];

foreach (glob(__DIR__ . '/*Routes.php') as $file) {
    if (basename($file) === 'Routes.php') {
        continue;
    }
    
    $routes = array_merge($routes, require $file);
}

?>