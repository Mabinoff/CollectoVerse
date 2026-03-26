<?php

namespace App\Model\Role;

readonly class RoleSql
{
    public int $id_role;
    public string $name_role;

    public function __construct(array $data) {
        $this->id_role = $data['id_role'];
        $this->name_role = $data['name_role'];
    }
}

?>