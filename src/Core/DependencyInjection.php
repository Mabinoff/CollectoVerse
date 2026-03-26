<?php

namespace App\Core;

use App\Core\Database;
use App\Helper\ResendHelper;
use App\Repository\User\UserRepository;
use App\Repository\Role\RoleRepository;
use App\Repository\Contact\ContactRepository;
use App\Repository\Categorie\CategorieRepository;
use App\Repository\Item\ItemRepository;
use App\Repository\CategorieCreate\CategorieCreateRepository;
use App\Repository\Review\ReviewRepository;

use App\Service\User\UserService;
use App\Service\Role\RoleService;
use App\Service\Contact\ContactService;
use App\Service\Categorie\CategorieService;
use App\Service\Item\ItemService;
use App\Service\CategorieCreate\CategorieCreateService;
use App\Service\Email\ChangeEmailService;
use App\Service\Email\ForgotPasswordEmailService;
use App\Service\Email\RegisterEmailService;
use App\Service\Review\ReviewService;

use App\UseCase\CreateUserUseCase;

$databasePdo = new Database();
$databasePdo->connect();

$resendHelper = new ResendHelper();

$userRepository = new UserRepository($databasePdo);
$userService = new UserService($userRepository);

$roleRepository = new RoleRepository($databasePdo);
$roleService = new RoleService($roleRepository);

$createUserUseCase = new CreateUserUseCase($roleService, $userService);

$contactRepository = new ContactRepository($databasePdo);
$contactService = new ContactService($contactRepository);

$categorieRepository = new CategorieRepository($databasePdo);
$categorieService = new CategorieService($categorieRepository);

$itemRepository = new ItemRepository($databasePdo);
$itemService = new ItemService($itemRepository);

$categorieCreateRepository = new CategorieCreateRepository($databasePdo);
$categorieCreateService = new CategorieCreateService($categorieCreateRepository);

$reviewRepository = new ReviewRepository($databasePdo);
$reviewService = new ReviewService($reviewRepository);

$registerEmailService = new RegisterEmailService($resendHelper);
$changeEmailService = new ChangeEmailService($resendHelper);
$forgotPasswordEmailService = new ForgotPasswordEmailService($resendHelper);

$availablesDependencies = [
    'userService' => $userService,
    'createUserUseCase' => $createUserUseCase,
    'contactService' => $contactService,
    'categorieService' => $categorieService,
    'itemService' => $itemService,
    'categorieCreateService' => $categorieCreateService,
    'reviewService' => $reviewService,
    'registerEmailService' => $registerEmailService,
    'changeEmailService' => $changeEmailService,
    'forgotPasswordEmailService' => $forgotPasswordEmailService
];

?>