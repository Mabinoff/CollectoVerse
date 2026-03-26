<?php

namespace App\Repository\Role;

use App\Model\Role\RoleSql;

interface IRoleRepository
{
    public function getRole(string $nameRole): ?RoleSql;
}

?>