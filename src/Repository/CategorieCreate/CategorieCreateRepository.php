<?php

namespace App\Repository\CategorieCreate;

use App\Core\Database;
use App\Model\CategorieCreate\CategorieCreateSql;

class CategorieCreateRepository implements ICategorieCreateRepository
{
    public function __construct(
        private readonly Database $databasePdo
    ) {}

    public function create(int $idUser, int $idCategorie, string $color)
    {
        $query = 'INSERT INTO To_Create (id_user, id_categorie, color) VALUES (?, ?, ?)';
        $params = [$idUser, $idCategorie, $color];
        $this->databasePdo->exec($query, $params);
    }

    public function get(int $idUser): array
    {
        $query = 'SELECT h.*, c.name_categorie as name FROM To_Create h JOIN Categorie c ON c.id_categorie = h.id_categorie WHERE h.id_user = ?';
        $data = $this->databasePdo->getRows($query, [$idUser]);
        return array_map(
            fn(array $d) => new CategorieCreateSql($d),
            $data
        );
    }

    public function delete(int $idUser, int $idCategorie)
    {
        $query = 'DELETE FROM To_Create WHERE id_user = ? AND id_categorie = ?';
        $params = [$idUser, $idCategorie];
        $this->databasePdo->exec($query, $params);
    }

    public function update(int $idUser, int $idCategorie, string $color)
    {
        $query = 'UPDATE To_Create SET color = ? WHERE id_user = ? AND id_categorie = ?';
        $params = [$color, $idUser, $idCategorie];
        $this->databasePdo->exec($query, $params);
    }
}

?>