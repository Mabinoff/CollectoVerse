<?php

require_once __DIR__ . '/../src/Core/Router.php';
require_once __DIR__ . '/../src/Repository/User/UserRepository.php';
require_once __DIR__ . '/../src/Service/User/UserService.php';

$databasePdo = new Database();
$databasePdo->connect();

$userRepository = new UserRepository($databasePdo);
$userService = new UserService($userRepository);

$userService->createUser('admin', 'ma.paoly@gmail.com', 'admin', 2);

?>