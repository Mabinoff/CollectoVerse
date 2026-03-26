<?php

namespace App\Service\Role;

use App\Repository\Role\IRoleRepository;
use App\Model\Role\Role;


class RoleService implements IRoleService
{
    public function __construct(
        private readonly IRoleRepository $roleRepository
    )
    {}

    public function getRole(string $nameRole): Role
    {
        $role = $this->roleRepository->getRole($nameRole);
        if ($role) {
            return new Role($role->id_role, $role->name_role);
        }
        throw new \Exception('Role not found');
    }
}

?>