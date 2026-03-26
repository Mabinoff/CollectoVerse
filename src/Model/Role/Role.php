<?php

namespace App\Model\Role;

class Role
{
    private int $idRole;
    private string $name;

    public function __construct(
        int $idRole,
        string $name
    ) {
        $this->idRole = $idRole;
        $this->name = $name;
    }

    public function getIdRole(): int
    {
        return $this->idRole;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}

?>