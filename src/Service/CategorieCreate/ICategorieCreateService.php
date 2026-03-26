<?php

namespace App\Service\CategorieCreate;

interface ICategorieCreateService
{
    public function create(int $idUser, int $idCategorie, string $color);
    
    /**
     * @return CategorieCreate[]
     */
    public function get(int $idUser): array;

    public function delete(int $idUser, int $idCategorie);

    public function update(int $idUser, int $idCategorie, string $color);
}
?>