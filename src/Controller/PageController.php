<?php

namespace App\Controller;

use App\Service\CategorieCreate\ICategorieCreateService;
use App\Service\Categorie\ICategorieService;
use App\Service\Contact\IContactService;
use App\Service\Item\IItemService;
use App\Service\Review\IReviewService;
use App\Service\User\IUserService;

class PageController
{
    public function __construct(
        private readonly ICategorieCreateService $categorieCreateService,
        private readonly ICategorieService $categorieService,
        private readonly IItemService $itemService,
        private readonly IReviewService $reviewService,
        private readonly IUserService $userService,
        private readonly IContactService $contactService,
    ) {}

    private function loadCategories()
    {
        $idUser = $_SESSION['idUser'];

        $categories = $this->categorieService->getCategories();
        $_SESSION['categories'] = $categories;

        $categoriesCreate = $this->categorieCreateService->get($idUser);
        $_SESSION['categoriesCreate'] = $categoriesCreate;
    }

    public function home() {
        require __DIR__ . '/../../views/home.php';
    }

    public function profile() {
        require __DIR__ . '/../../views/profile.php';
    }

    public function reviews() {
        $reviews = $this->reviewService->getReviews();
        $_SESSION['reviews'] = $reviews;
        require __DIR__ . '/../../views/reviews.php';
    }

    public function contact() {
        require __DIR__ . '/../../views/contact.php';
    }

    public function privacyPolicy() {
        require __DIR__ . '/../../views/terms/privacyPolicy.php';
    }

    public function rgpd() {
        require __DIR__ . '/../../views/terms/rgpd.php';
    }

    public function terms() {
        require __DIR__ . '/../../views/terms/terms.php';
    }

    public function error404() {
        require __DIR__ . '/../../views/errors/404.php';
    }

    public function collection() {

        $idUser = $_SESSION['idUser'];
        $search = $_GET['search'] ?? '';

        if (isset($_GET['idCategorie'])) {
            $itemsFiltered = $this->itemService->getItemsWithIdCategorie($idUser, (int) $_GET['idCategorie'], $search);
            $_SESSION['items'] = $itemsFiltered;
        } else {
            $items = $this->itemService->getItems($idUser, $search);
            $_SESSION['items'] = $items;
        }

        
        $this->loadCategories();
        require __DIR__ . '/../../views/items/collection.php';
    }

    public function createCard() {
        $this->loadCategories();
        require __DIR__ . '/../../views/items/createCard.php';
    }

    public function viewCard(int $idItem) {
        $_SESSION["item"] = $this->itemService->getItem($idItem);
        require __DIR__ . '/../../views/items/viewCard.php';
    }

    public function forgotPassword() {
        require __DIR__ . '/../../views/forgotPassword/forgotPassword.php';
    }

    public function login() {
        require __DIR__ . '/../../views/auth/login.php';
    }

    public function register() {
        require __DIR__ . '/../../views/auth/register.php';
    }

    public function forgotPasswordCode() {
        if (isset($_SESSION['forgotPasswordEmail'])) {
            require __DIR__ . '/../../views/forgotPassword/forgotPasswordCode.php';
        } else {
            header('Location: /');
        }
    }
    
    public function forgotPasswordNew() {
        if (isset($_SESSION['forgotPasswordNew'])) {
            require __DIR__ . '/../../views/forgotPassword/forgotPasswordNew.php';
        } else {
            header('Location: /');
        }
    }

    public function adminLogin() {
        require __DIR__ . '/../../views/admin/login.php';
    }   

    public function registerCode() {
        if (!isset($_SESSION['registerEmail'])) {
            header('Location: /register');
            exit;
        }
        require __DIR__ . '/../../views/auth/registerCode.php';
    } 

    public function resetCode() {
        require __DIR__ . '/../../views/auth/resetCode.php';
    }

    public function adminReview() {
        require __DIR__ . '/../../views/admin/reviews.php';
    }

    private function getUsers()
    {
        $users = $this->userService->getUsers();
        $_SESSION['users'] = $users;
    }

    private function getReviews()
    {
        $reviews = $this->reviewService->getReviews();
        $_SESSION['reviews'] = $reviews;
    }

    private function getContacts()
    {
        $contacts = $this->contactService->getContacts();
        $_SESSION['contacts'] = $contacts;
    }

    public function adminDashboard() {
        $this->getUsers();
        $this->getContacts();
        require __DIR__ . '/../../views/admin/adminDashboard.php';
    } 

    public function deleteAccount() {
        require __DIR__ . '/../../views/auth/deleteAccount.php';
    }

    public function adminUsers() {
        $this->getUsers();
        require __DIR__ . '/../../views/admin/adminUsers.php';
    }

    public function adminReviews() {
        $this->getReviews();
        require __DIR__ . '/../../views/admin/adminReviews.php';
    }

    public function adminContact() {
        $this->getContacts();
        require __DIR__ . '/../../views/admin/adminContact.php';
    }
}   

?>