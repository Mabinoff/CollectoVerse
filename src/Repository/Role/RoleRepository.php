<?php

namespace App\Repository\Role;

use App\Core\Database;
use App\Model\Role\RoleSql;

class RoleRepository implements IRoleRepository {

    public function __construct(
        private readonly Database $databasePdo
    ) {}

    public function getRole(string $nameRole): ?RoleSql
    {
        $query = 'SELECT * FROM Role WHERE name_role = ?';
        $params = [$nameRole];
        $role = $this->databasePdo->getRow($query, $params);

        if ($role) {
            return new RoleSql($role);
        }
        return null;
    }
}

?>