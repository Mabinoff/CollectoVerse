<?php

namespace App\Service\Role;

use App\Model\Role\Role;

interface IRoleService
{
    public function getRole(string $nameRole): Role;
}

?>