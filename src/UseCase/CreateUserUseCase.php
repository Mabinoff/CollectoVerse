<?php

namespace App\UseCase;

use App\Service\Role\IRoleService;
use App\Service\User\IUserService;
use App\Model\User\User;

class CreateUserUseCase
{
    public function __construct(
        private readonly IRoleService $roleService,
        private readonly IUserService $userService,
    ) {}

    public function execute(string $username, string $email, string $password): User
    {
        $role = $this->roleService->getRole('user');
        return $this->userService->createUser($username, $email, $password, $role->getIdRole());
    }
}

?>