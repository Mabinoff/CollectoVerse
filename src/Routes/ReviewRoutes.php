<?php

use App\Controller\ReviewController;

return [
    [
        'path' => '/create-review',
        'parameter' => false,
        'controller' => ReviewController::class,
        'method' => 'createReview',
        'isLogged' => true,
        'dependencies' => ['reviewService']
    ],
    [
        'path' => '/delete-review',
        'parameter' => true,
        'controller' => ReviewController::class,
        'method' => 'deleteReview',
        'isLogged' => true,
        'dependencies' => ['reviewService']
    ],
]

?>