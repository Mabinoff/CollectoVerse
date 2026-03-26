<?php

namespace App\Model\CategorieCreate;

class CategorieCreate
{
    private string $color;
    private string $name;
    private int $idUser;
    private int $idCategorie;

    public function __construct(
        string $color,
        string $name,
        int $idUser,
        int $idCategorie
    )
    {
        $this->color = $color;
        $this->name = $name;
        $this->idUser = $idUser;
        $this->idCategorie = $idCategorie;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function getIdCategorie(): int
    {
        return $this->idCategorie;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }
}

?>