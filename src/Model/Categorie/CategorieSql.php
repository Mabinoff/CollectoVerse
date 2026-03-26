<?php

namespace App\Model\Categorie;

readonly class CategorieSql
{
    public int $id_categorie;
    public string $name;

    public function __construct(array $data)
    {
        $this->id_categorie = (int) $data['id_categorie'];
        $this->name = $data['name_categorie'];
    }
}

?>