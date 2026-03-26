<?php

namespace App\Service\Categorie;

use App\Model\Categorie\Categorie;

interface ICategorieService
{
    public function createCategorie(string $nameCategorie, int $idUser);

    public function deleteCategorie(int $idCategorie);

    /**
     * @return Categorie[]
     */
    public function getCategories(): array;

    public function getCategorie(int $idCategorie): Categorie;
}

?>