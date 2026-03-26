<?php

use App\Controller\UserController;

return [
    [
        'path' => '/user-login',
        'parameter' => false,
        'controller' => UserController::class,
        'method' => 'login',
        'isLogged' => false,
        'dependencies' => ['userService', 'createUserUseCase', 'registerEmailService', 'forgotPasswordEmailService']
    ],
    [
        'path' => '/user-register',
        'parameter' => false,
        'controller' => UserController::class,
        'method' => 'register',
        'isLogged' => false,
        'dependencies' => ['userService', 'createUserUseCase', 'registerEmailService', 'forgotPasswordEmailService']
    ],
    [
        'path' => '/user-register-code',
        'parameter' => false,
        'controller' => UserController::class,
        'method' => 'registerCode',
        'isLogged' => false,
        'dependencies' => ['userService', 'createUserUseCase', 'registerEmailService', 'forgotPasswordEmailService']
    ],
    [
        'path' => '/user-logout',
        'parameter' => false,
        'controller' => UserController::class,
        'method' => 'logout',
        'isLogged' => true,
        'dependencies' => ['userService', 'createUserUseCase', 'registerEmailService', 'forgotPasswordEmailService']
    ],
    [
        'path' => '/forgot-password-request',
        'parameter' => false,
        'controller' => UserController::class,
        'method' => 'forgotPassword',
        'isLogged' => false,
        'dependencies' => ['userService', 'createUserUseCase', 'registerEmailService', 'forgotPasswordEmailService']
    ],
    [
        'path' => '/forgot-password-code-action',
        'parameter' => false,
        'controller' => UserController::class,
        'method' => 'forgotPasswordCode',
        'isLogged' => false,
        'dependencies' => ['userService', 'createUserUseCase', 'registerEmailService', 'forgotPasswordEmailService']
    ],
    [
        'path' => '/forgot-password-new-action',
        'parameter' => false,
        'controller' => UserController::class,
        'method' => 'forgotPasswordNew',
        'isLogged' => false,
        'dependencies' => ['userService', 'createUserUseCase', 'registerEmailService', 'forgotPasswordEmailService']
    ],
    [
        'path' => '/user-delete-account',
        'parameter' => false,
        'controller' => UserController::class,
        'method' => 'deleteAccount',
        'isLogged' => true,
        'dependencies' => ['userService', 'createUserUseCase', 'registerEmailService', 'forgotPasswordEmailService']
    ],
]

?>