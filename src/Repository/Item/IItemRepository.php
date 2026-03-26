<?php

namespace App\Repository\Item;

use App\Model\Item\ItemSql;

interface IItemRepository
{
    public function createItem(string $nameItem, string $descriptionItem, int $idUser, string $path, ?int $idCategorie);

    public function deleteItem(int $idItem);

    public function updateItem(int $idItem, string $nameItem, string $descriptionItem, \DateTime $updatedAt, ?int $idCategorie);

    public function getItem(int $idItem): ItemSql;

    /**
     * @return ItemSql[]
     */
    public function getItems(int $idUser, string $search): array;

    /**
     * @return ItemSql[]
     */
    public function getItemsWithIdCategorie(int $idUser, int $idCategorie, string $search): array;
}

?>