<?php

namespace App\Repository\Categorie;

use App\Core\Database;
use App\Model\Categorie\CategorieSql;

class CategorieRepository implements ICategorieRepository
{
    public function __construct(
        private readonly Database $databasePdo
    ) {}

    public function createCategorie(string $nameCategorie, int $idUser)
    {
        $query = 'INSERT INTO Categorie (name_categorie, id_usser) VALUES (?, ?)';
        $params = [$nameCategorie, $idUser];
        $this->databasePdo->exec($query , $params);
    }

    public function deleteCategorie(int $idCategorie)
    {
        $query = 'DELETE FROM Categorie WHERE id_categorie = ?';
        $params = [$idCategorie];
        $this->databasePdo->exec($query , $params);
    }

    public function getCategories(): array
    {
        $query = 'SELECT * FROM Categorie';
        $categoriesSql = $this->databasePdo->getRows($query);
        return array_map(
            fn(array $categorieSql) => new CategorieSql($categorieSql),
            $categoriesSql
        );
    }

    public function getCategorie(int $idCategorie): CategorieSql
    {
        $query = 'SELECT * FROM Categortie WHERE id_categorie = ?';
        $params = [$idCategorie];
        $data = $this->databasePdo->getRow($query, $params);
        return new CategorieSql($data);
    }
}

?>