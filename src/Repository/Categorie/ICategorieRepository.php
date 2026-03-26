<?php

namespace App\Repository\Categorie;
use App\Model\Categorie\CategorieSql;

interface ICategorieRepository
{
    public function createCategorie(string $nameCategorie, int $idUser);

    public function deleteCategorie(int $idCategorie);

    /**
     * @return CategorieSql[]
     */
    public function getCategories(): array;

    public function getCategorie(int $idCategorie): CategorieSql;
}

?>