<?php

namespace App\Service\CategorieCreate;

use App\Repository\CategorieCreate\ICategorieCreateRepository;
use App\Model\CategorieCreate\CategorieCreate;
use App\Model\CategorieCreate\CategorieCreateSql;


class CategorieCreateService implements ICategorieCreateService
{
    public function __construct(
        private readonly ICategorieCreateRepository $categorieCreateRepository
    ) {}

    public function create(int $idUser, int $idCategorie, string $color)
    {
        $this->categorieCreateRepository->create($idUser, $idCategorie, $color);
    }

    public function get(int $idUser): array
    {
        $data = $this->categorieCreateRepository->get($idUser);
        return array_map(
            fn(CategorieCreateSql $categorieCreate) => new CategorieCreate(
                $categorieCreate->color,
                $categorieCreate->name,
                $categorieCreate->id_user,
                $categorieCreate->id_categorie
            ),
            $data
        );
    }

    public function delete(int $idUser, int $idCategorie)
    {
        $this->categorieCreateRepository->delete($idUser, $idCategorie);
    }

    public function update(int $idUser, int $idCategorie, string $color)
    {
        $this->categorieCreateRepository->update($idUser, $idCategorie, $color);
    }
}

?>