<?php

use App\Controller\PageController;

return [
    [
        'path' => '/',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'home',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/profile',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'profile',
        'isLogged' => true,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/reviews',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'reviews',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/contact',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'contact',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/privacy-policy',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'privacyPolicy',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/rgpd',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'rgpd',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/terms',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'terms',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/not-found',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'error404',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/not-authorize',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'error403',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/create-card',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'createCard',
        'isLogged' => true,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/view-card',
        'parameter' => true,
        'controller' => PageController::class,
        'method' => 'viewCard',
        'isLogged' => true,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/collection',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'collection',
        'isLogged' => true,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/forgot-password',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'forgotPassword',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/login',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'login',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/register',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'register',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/reset-password',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'resetPassword',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/admin-login',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'adminLogin',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/register-code',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'registerCode',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/admin-contact',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'adminContact',
        'isLogged' => false,
        'isLoggedAdmin' => true,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/admin-dashboard',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'adminDashboard',
        'isLogged' => false,
        'isLoggedAdmin' => true,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/admin-review',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'adminReview',
        'isLogged' => false,
        'isLoggedAdmin' => true,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/forgot-password-code',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'forgotPasswordCode',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/forgot-password-new',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'forgotPasswordNew',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/delete-account',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'deleteAccount',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/admin-dashboard',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'adminDashboard',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/admin-users',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'adminUsers',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/admin-reviews',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'adminReviews',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
    [
        'path' => '/admin-contact',
        'parameter' => false,
        'controller' => PageController::class,
        'method' => 'adminContact',
        'isLogged' => false,
        'dependencies' => ['categorieCreateService', 'categorieService', 'itemService', 'reviewService', 'userService', 'contactService']
    ],
]

?>