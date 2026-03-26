<?php

namespace App\Model\Item;

readonly class ItemSql
{
    public int $idItem;
    public int $id_user;
    public int $idCategorie;
    public string $name;
    public string $description;
    public string $path;
    public string | null $name_categorie;
    public string | null $color_categorie;
    public \DateTime $createdAt;
    public \DateTime $updatedAt;

    public function __construct(array $data)
    {
        $this->idItem      = (int) $data['id_item'];
        $this->id_user      = (int) $data['id_user'];
        $this->idCategorie = (int) $data['id_categorie'];
        $this->name        = $data['name_item'];
        $this->description = $data['description_item'];
        $this->path        = $data['path'];
        $this->name_categorie = $data['name_categorie'];
        $this->color_categorie = $data['color_categorie'];
        $this->createdAt   = new \DateTime($data['created_at']);
        $this->updatedAt   = new \DateTime($data['updated_at']);
    }
}

?>