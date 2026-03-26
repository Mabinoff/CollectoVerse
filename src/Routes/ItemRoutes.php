<?php

use App\Controller\ItemController;

return [
    [
        'path' => '/create-item',
        'parameter' => false,
        'controller' => ItemController::class,
        'method' => 'createItem',
        'isLogged' => true,
        'dependencies' => ['itemService']
    ],
    [
        'path' => '/delete-item',
        'parameter' => true,
        'controller' => ItemController::class,
        'method' => 'deleteItem',
        'isLogged' => true,
        'dependencies' => ['itemService']
    ],
    [
        'path' => '/update-item',
        'parameter' => false,
        'controller' => ItemController::class,
        'method' => 'updateItem',
        'isLogged' => true,
        'dependencies' => ['itemService']
    ],
    [
        'path' => '/get-items',
        'parameter' => false,
        'controller' => ItemController::class,
        'method' => 'getItems',
        'isLogged' => true,
        'dependencies' => ['itemService']
    ],
    [
        'path' => '/get-image',
        'parameter' => true,
        'controller' => ItemController::class,
        'method' => 'getImage',
        'isLogged' => true,
        'dependencies' => ['itemService']
    ],
]

?>