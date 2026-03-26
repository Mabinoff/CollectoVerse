<?php

namespace App\Service\Item;

use App\Model\Item\Item;

interface IItemService
{
    public function createItem(string $nameItem, string $descriptionItem, int $idUser, string $path, ?int $idCategorie);

    public function deleteItem(int $idItem);

    public function updateItem(int $idItem, string $nameItem, string $descriptionItem, ?int $idCategorie);

    /**
     * @return Item[]
     */
    public function getItems(int $idUser, string $search): array;
    
    public function getItem(int $idItem): Item;

    /**
     * @return Item[]
     */
    public function getItemsWithIdCategorie(int $idUser, int $idCategorie, string $search): array;
}

?>