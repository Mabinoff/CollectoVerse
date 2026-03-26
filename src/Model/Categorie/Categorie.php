<?php

namespace App\Model\Categorie;

class Categorie
{
    private int $idCategorie;
    private string $name;

    public function __construct(
        string $idCategorie,
        string $name,
    )
    {
        $this->idCategorie = $idCategorie;
        $this->name = $name;
    }

    public function getIdCategorie(): int
    {
        return $this->idCategorie;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

?>