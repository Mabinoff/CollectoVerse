<?php

use App\Controller\CategorieCreateController;

return [
    [
        'path' => '/create-categorie',
        'parameter' => false,
        'controller' => CategorieCreateController::class,
        'method' => 'create',
        'isLogged' => true,
        'dependencies' => ['categorieCreateService']
    ],
    [
        'path' => '/delete-categorie',
        'parameter' => false,
        'controller' => CategorieCreateController::class,
        'method' => 'delete',
        'isLogged' => true,
        'dependencies' => ['categorieCreateService']
    ],
    [
        'path' => '/update-categorie',
        'parameter' => false,
        'controller' => CategorieCreateController::class,
        'method' => 'update',
        'isLogged' => true,
        'dependencies' => ['categorieCreateService']
    ],
]

?>