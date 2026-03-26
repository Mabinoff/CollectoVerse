<?php

namespace App\Controller;

use App\Service\CategorieCreate\ICategorieCreateService;
use Exception;

class CategorieCreateController
{
    public function __construct(
        private readonly ICategorieCreateService $categorieCreateService
    ) {}

    public function create()
    {
        try {
            if (!isset($_POST['idCategorie'], $_POST['color'])) {
                exit;
            }
    
            $color = $_POST['color'];
            $idCategorie = $_POST['idCategorie'];
            $idUser = $_SESSION['idUser'];
    
            $this->categorieCreateService->create($idUser, $idCategorie, $color);
            
            $_SESSION['createCategorieError'] = '';
            header('Location: /create-card');
        } catch (Exception $e) {
            $_SESSION['createCategorieError'] = "Erreur lors de la création d'une catégorie";
            header('Location: /create-card');
        }
    }

    public function delete()
    {
        if (!isset($_POST['idCategorie'])) {
            exit;
        }

        $idCategorie = $_POST['idCategorie'];
        $idUser = $_SESSION['idUser'];

        $this->categorieCreateService->delete($idUser, $idCategorie);
        
        header('Location: /collection');
        exit;
    }

    public function update()
    {
        if (!isset($_POST['idCategorie'], $_POST['color'])) {
            exit;
        }

        $color = $_POST['color'];
        $idCategorie = $_POST['idCategorie'];
        $idUser = $_SESSION['idUser'];

        $this->categorieCreateService->update($idUser, $idCategorie, $color);
        
        header('Location: /collection');
        exit;
    }
}

?>