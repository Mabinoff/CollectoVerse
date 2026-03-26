<?php

namespace App\Controller;

use App\Service\Contact\IContactService;
use App\Service\Review\IReviewService;
use App\Service\User\IUserService;
use Exception;

class AdminController
{
    public function __construct(
        private readonly IUserService $userService,
        private readonly IContactService $contactService,
        private readonly IReviewService $reviewService,
    ) {}

    private function setAdminLoginError(string $e)
    {
        $_SESSION['adminLoginError'] = $e;
    }

    private function setAdminContactError(string $e)
    {
        $_SESSION['adminContactError'] = $e;
        header('Location: /admin-contact');
        exit;
    }

    private function setAdminReviewError(string $e)
    {
        $_SESSION['adminReviewError'] = $e;
        header('Location: /admin-reviews');
        exit;
    }

    public function login()
    {
        try {
            echo($_POST['login'] );
            $login = $_POST['login'] ?? null;
            $password = $_POST['password'] ?? null;
    
            if (!$login || !$password) {
                $this->setAdminLoginError('Veuillez compléter toutes les informations');
                header('Location: /admin-login');
                exit;
            }
    
            $user = $this->userService->login($login, $password, 'admin');
            
            $_SESSION['idUserAdmin'] = $user->getIdUser();
            header('Location: /admin-dashboard');
        } catch (\Exception $e) {
            $this->setAdminLoginError($e->getMessage());
            header('Location: /admin-login');
        }
    }

    public function deleteUser(string $idUser)
    {
        try {
            if (!$idUser) {
                header('Location: /admin-dashboard');
                exit;
            }

            $this->userService->deleteUserWithoutPassword((int) $idUser);
            } catch (\Exception $e) {} finally {
            header('Location: /admin-dashboard');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }

    public function deleteContact()
    {
        try {
            $idContact = $_POST['idContact'] ?? null;
            if (!$idContact) {
                $this->setAdminContactError("Paramètre invalid");
            }
    
            $this->contactService->deleteContact((int) $idContact);

            $_SESSION['adminContactError'] = '';
            header('Location: /admin-contact');
        } catch (Exception $e) {
            $this->setAdminContactError("Erreur lors de la suppression d'un contact");
        }
    }

    public function seenContact()
    {
        try {
            $idContact = $_POST['idContact'] ?? null;
            if (!$idContact) {
                $this->setAdminContactError("Paramètre invalid");
            }

            $this->contactService->seenContact((int) $idContact, true);

            $_SESSION['adminContactError'] = '';
            header('Location: /admin-contact');
        } catch (Exception $e) {
            $this->setAdminContactError("Impossible de changer l'état ");
        }
    }

    public function deleteReview()
    {
        try {
            $idReview = $_SESSION['idReview'] ?? null;

            if (!$idReview) {
                $this->setAdminReviewError("Paramètres invalid");
            }

            $this->reviewService->deleteReview((int) $idReview);

            $_SESSION['adminReviewError'] = '';
            header('Location: /admin-reviews');
        } catch (Exception $e) {
            $this->setAdminReviewError("Erreur lors de la supression d'un avis");
        }
    }
}

?>