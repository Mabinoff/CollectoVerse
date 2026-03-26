<?php

namespace App\Service\Categorie;

use App\Repository\Categorie\ICategorieRepository;
use App\Model\Categorie\Categorie;
use App\Model\Categorie\CategorieSql;

class CategorieService implements ICategorieService
{

    private int $NAME_CATEGORIE_MAX_SIZE = 32;

    public function __construct(
        private readonly ICategorieRepository $categorieRepository
    ) {}

    public function createCategorie(string $nameCategorie, int $idUser)
    {
        if (strlen($nameCategorie) > $this->NAME_CATEGORIE_MAX_SIZE) {
            throw new \Exception('Le nom de la catégorie doit être inférieur à' . $this->NAME_CATEGORIE_MAX_SIZE . 'caractères');
        }

        $this->categorieRepository->createCategorie($nameCategorie, $idUser);
    }

    public function getCategories(): array
    {
        $categoriesSql = $this->categorieRepository->getCategories();
        return array_map(
            fn(CategorieSql $categorieSql) => new Categorie(
                $categorieSql->id_categorie,
                $categorieSql->name,
            ),
            $categoriesSql
        );
    }

    public function deleteCategorie(int $idCategorie)
    {
        $this->categorieRepository->deleteCategorie($idCategorie);
    }

    public function getCategorie(int $idCategorie): Categorie
    {
        $categorieSql = $this->categorieRepository->getCategorie($idCategorie);
        return new Categorie($categorieSql->id_categorie, $categorieSql->name);
    }
}

?>