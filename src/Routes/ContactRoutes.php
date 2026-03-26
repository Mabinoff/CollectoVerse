<?php

use App\Controller\ContactController;

return [
    [
        'path' => '/create-contact',
        'parameter' => false,
        'controller' => ContactController::class,
        'method' => 'createContact',
        'isLogged' => false,
        'dependencies' => ['contactService', 'contactService']
    ],
]

?>