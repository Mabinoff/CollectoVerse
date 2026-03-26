<?php

use App\Controller\AdminController;

return [
    [
        'path' => '/admin-login-form',
        'parameter' => false,
        'controller' => AdminController::class,
        'method' => 'login',
        'isLogged' => false,
        'isLoggedAdmin' => false,
        'dependencies' => ['userService', 'contactService', 'reviewService']
    ],
    [
        'path' => '/admin-logout',
        'parameter' => false,
        'controller' => AdminController::class,
        'method' => 'logout',
        'isLogged' => false,
        'isLoggedAdmin' => true,
        'dependencies' => ['userService', 'contactService', 'reviewService']
    ],
    [
        'path' => '/admin-delete-user',
        'parameter' => true,
        'controller' => AdminController::class,
        'method' => 'logout',
        'isLogged' => false,
        'isLoggedAdmin' => true,
        'dependencies' => ['userService', 'contactService', 'reviewService']
    ],
    [
        'path' => '/delete-contact',
        'parameter' => true,
        'controller' => AdminController::class,
        'method' => 'deleteContact',
        'isLogged' => false,
        'isLoggedAdmin' => true,
        'dependencies' => ['userService', 'contactService', 'reviewService']
    ],
    [
        'path' => '/seen-contact',
        'parameter' => true,
        'controller' => AdminController::class,
        'method' => 'seenContact',
        'isLogged' => false,
        'isLoggedAdmin' => true,
        'dependencies' => ['userService', 'contactService', 'reviewService']
    ],
    [
        'path' => '/delete-review',
        'parameter' => true,
        'controller' => AdminController::class,
        'method' => 'deleteReview',
        'isLogged' => false,
        'isLoggedAdmin' => true,
        'dependencies' => ['userService', 'contactService', 'reviewService']
    ],
]

?>