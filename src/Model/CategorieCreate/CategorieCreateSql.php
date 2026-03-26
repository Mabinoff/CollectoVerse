<?php

namespace App\Model\CategorieCreate;

readonly class CategorieCreateSql
{
    public string $color;
    public string $name;
    public int $id_categorie;
    public int $id_user;

    public function __construct(array $data)
    {
        $this->id_categorie = (int) $data['id_categorie'];
        $this->color = $data['color'];
        $this->name = $data['name'];
        $this->id_user = (int) $data['id_user'];
    }
}

?>