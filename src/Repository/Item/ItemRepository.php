<?php

namespace App\Repository\Item;

use App\Core\Database;
use App\Model\Item\ItemSql;

class ItemRepository implements IItemRepository
{
    public function __construct(
        private readonly Database $databasePdo
    ) {}

    public function getItems(int $idUser, string $search): array
    {
        $query = "
            SELECT
                i.*,
                t.color as color_categorie, 
                c.name_categorie
            FROM Item i
            LEFT JOIN To_Create t ON t.id_categorie = i.id_categorie
            LEFT JOIN Categorie c ON c.id_categorie = i.id_categorie
            WHERE i.id_user = ? AND i.name_item LIKE ?
        ";
        $params = [$idUser, "%$search%"];
        $rows = $this->databasePdo->getRows($query, $params);
        return array_map(fn($row) => new ItemSql($row), $rows);
    }

    public function createItem(string $nameItem, string $descriptionItem, int $idUser, string $path, ?int $idCategorie)
    {
        $query = 'INSERT INTO Item (name_item, description_item, id_user, id_categorie, path) VALUES (?, ?, ?, ?, ?)';
        $params = [$nameItem, $descriptionItem, $idUser, $idCategorie, $path];
        return $this->databasePdo->exec($query, $params);
    }

    public function updateItem(int $idItem, string $nameItem, string $descriptionItem, \DateTime $updatedAt, ?int $idCategorie)
    {
        $query = 'UPDATE Item SET name_item = ?, description_item = ?, updated_at = ?, id_categorie = ? WHERE id_item = ?';
        $params = [$nameItem, $descriptionItem, $updatedAt->format('Y-m-d H:i:s'), $idCategorie, $idItem];
        return $this->databasePdo->exec($query, $params);
    }

    public function deleteItem(int $idItem)
    {
        $query = 'DELETE FROM Item WHERE id_item = ?';
        $params = [$idItem];
        return $this->databasePdo->exec($query, $params);
    }

    public function getItem(int $idItem): ItemSql
    {
        $query = "
            SELECT
                i.*,
                t.color as color_categorie, 
                c.name_categorie
            FROM Item i
            LEFT JOIN To_Create t ON t.id_categorie = i.id_categorie
            LEFT JOIN Categorie c ON c.id_categorie = i.id_categorie
            WHERE i.id_item = ?
        ";
        $params = [$idItem];
        $data = $this->databasePdo->getRow($query, $params);
        return  new ItemSql($data);
    }

    public function getItemsWithIdCategorie(int $idUser, int $idCategorie, string $search): array
    {
        $query = "
            SELECT
                i.*,
                t.color as color_categorie, 
                c.name_categorie
            FROM Item i
            LEFT JOIN To_Create t ON t.id_categorie = i.id_categorie
            LEFT JOIN Categorie c ON c.id_categorie = i.id_categorie
            WHERE i.id_user = ? AND i.id_categorie = ? AND i.name_item LIKE ?
        ";
        $params = [$idUser, $idCategorie, "%$search%"];
        $rows = $this->databasePdo->getRows($query, $params);
        return array_map(fn($row) => new ItemSql($row), $rows);
    } 
}

?>