<?php

namespace App\Controller;

use App\Service\Item\IItemService;
use App\Helper\FileHelper;

class ItemController
{
    public function __construct(
        private readonly IItemService $itemService
    ) {}

    private function setCreateItemError(string $error)
    {
        $_SESSION['createItemError'] = $error;
        header('Location: /create-card');
        exit;
    }

    public function createItem()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }

        if (!isset($_POST['name'], $_POST['description'], $_FILES['image'])) {
            $this->setCreateItemError('Veuillez entrer les informations');
        }

        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $idCategorie = !empty($_POST['idCategorie']) ? (int) $_POST['idCategorie'] : null;

        if ($_FILES['image']['error'] !== 0) {
            $this->setCreateItemError('Veuillez entrer une image');
        }

        $idUser = $_SESSION['idUser'];
        $imageFilename = FileHelper::saveImage($_FILES['image']['tmp_name']);


        $this->itemService->createItem(
            $name,
            $description,
            $idUser,
            $imageFilename,
            $idCategorie,
        );

        header('Location: /collection');
        exit;
    }

    public function deleteItem(int $idItem)
    {
        $this->itemService->deleteItem($idItem);

        header('Location: /collection');
        exit;
    }

    public function updateItem()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }

        if (!isset($_POST['idItem'], $_POST['name'], $_POST['description'])) {
            throw new \Exception('Données manquantes');
        }

        $idItem = (int) $_POST['idItem'];
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $idCategorie = !empty($_POST['idCategorie']) ? (int) $_POST['idCategorie'] : null;

        $this->itemService->updateItem(
            $idItem,
            $name,
            $description,
            $idCategorie
        );

        $_SESSION['flash_success'] = "Ta carte mise à jour !";
        header('Location: /view-card/' . $idItem);
        exit;
    }

    public function getImage(string $filename)
    {
        FileHelper::getImage($filename);
        exit;
    }
}

?>