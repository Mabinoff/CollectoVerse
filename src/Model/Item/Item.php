<?php

namespace App\Model\Item;

class Item
{
    private int $idItem;
    private int $idUser;
    private int $idCategorie;
    private string $name;
    private string $description;
    private string $path;
    public string | null $nameCategorie;
    public string | null $colorCategorie;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    public function __construct(
        int $idItem,
        int $idUser,
        int $idCategorie,
        string $name,
        string $description,
        string $path,
        string | null $nameCategorie,
        string | null $colorCategorie,
        \DateTime $createdAt,
        \DateTime $updatedAt
    ) {
        $this->idItem = $idItem;
        $this->idUser = $idUser;
        $this->idCategorie = $idCategorie;
        $this->name = $name;
        $this->description = $description;
        $this->path = $path;
        $this->nameCategorie = $nameCategorie;
        $this->colorCategorie = $colorCategorie;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getIdItem(): int
    {
        return $this->idItem;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function getIdCategorie(): int
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(int $idCategorie)
    {
        $this->idCategorie = $idCategorie;
        $this->setUpdatedAt();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        $this->setUpdatedAt();
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
        $this->setUpdatedAt();
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getNameCategorie(): string | null
    {
        return $this->nameCategorie;
    }

    public function getColorCategorie(): string | null
    {
        return $this->colorCategorie;
    }
}

?>