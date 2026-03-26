<?php

namespace App\Service\Item;

use App\Repository\Item\IItemRepository;
use App\Model\Item\Item;
use App\Model\Item\ItemSql;

class ItemService implements IItemService
{
    private int $NAME_MAX_SIZE = 32;
    private int $DESCRIPTION_MAX_SIZE = 1024;

    public function __construct(
        private readonly IItemRepository $itemRepository
    ) {}

    private function checkNameItem(string $nameItem)
    {
        if (strlen($nameItem) > $this->NAME_MAX_SIZE) {
            throw new \Exception('Le nom doit être inférieur à ' . $this->NAME_MAX_SIZE . ' caractères');
        }
    }

    private function checkDescriptionItem(string $descriptionItem)
    {
        if (strlen($descriptionItem) > $this->DESCRIPTION_MAX_SIZE) {
            throw new \Exception('La description doit être inférieur à ' . $this->DESCRIPTION_MAX_SIZE . ' caractères');
        }
    }

    public function createItem(string $nameItem, string $descriptionItem, int $idUser, string $path, ?int $idCategorie)
    {
        $this->checkNameItem($nameItem);
        $this->checkDescriptionItem($descriptionItem);

        $this->itemRepository->createItem($nameItem, $descriptionItem, $idUser, $path, $idCategorie);
    }

    public function updateItem(int $idItem, string $nameItem, string $descriptionItem, ?int $idCategorie)
    {
        $this->checkNameItem($nameItem);
        $this->checkDescriptionItem($descriptionItem);
        
        $updatedAt = new \DateTime();
        $this->itemRepository->updateItem(
            $idItem,
            $nameItem,
            $descriptionItem,
            $updatedAt,
            $idCategorie
        );
    }

    public function deleteItem(int $idItem)
    {
        $this->itemRepository->deleteItem($idItem);
    }

    public function getItems(int $idUser, string $search): array
    {
        $itemsSql = $this->itemRepository->getItems($idUser, $search);
        return array_map(
            fn(ItemSql $itemSql) => new Item(
                $itemSql->idItem,
                $itemSql->id_user,
                $itemSql->idCategorie,
                $itemSql->name,
                $itemSql->description,
                $itemSql->path,
                $itemSql->name_categorie,
                $itemSql->color_categorie,
                $itemSql->createdAt,
                $itemSql->updatedAt,
            ),
            $itemsSql
        );
    }

    public function getItem(int $idItem): Item
    {
        $itemSql = $this->itemRepository->getItem($idItem);
        return new Item(
            $itemSql->idItem,
            $itemSql->id_user,
            $itemSql->idCategorie,
            $itemSql->name,
            $itemSql->description,
            $itemSql->path,
            $itemSql->name_categorie,
            $itemSql->color_categorie,
            $itemSql->createdAt,
            $itemSql->updatedAt,
        );        
    }

    public function getItemsWithIdCategorie(int $idUser, int $idCategorie, string $search): array
    {
        $itemsSql = $this->itemRepository->getItemsWithIdCategorie($idUser, $idCategorie, $search);
        return array_map(
            fn(ItemSql $itemSql) => new Item(
                $itemSql->idItem,
                $itemSql->id_user,
                $itemSql->idCategorie,
                $itemSql->name,
                $itemSql->description,
                $itemSql->path,
                $itemSql->name_categorie,
                $itemSql->color_categorie,
                $itemSql->createdAt,
                $itemSql->updatedAt,
            ),
            $itemsSql
        );
    }
}

?>