<?php

namespace App\Repository\CategorieCreate;

interface ICategorieCreateRepository
{
    public function create(int $idUser, int $idCategorie, string $color);

    /**
     * @return CategorieCreateSql[]
     */
    public function get(int $idUser): array;

    public function delete(int $idUser, int $idCategorie);

    public function update(int $idUser, int $idCategorie, string $color);
}

?>