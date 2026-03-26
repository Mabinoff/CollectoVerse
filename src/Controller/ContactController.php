<?php

namespace App\Controller;

use App\Service\Contact\IContactService;

class ContactController
{
    public function __construct(
        private readonly IContactService $contactService
    ) {}

    private function setContactError(string $error)
    {
        $_SESSION['contactError'] = $error;
    }

    public function createContact()
    {
        if (!isset($_SESSION['idUser'])) {
            header('Location: /login');
            exit;
        }

        if (!isset($_POST['email'], $_POST['title'], $_POST['content'])) {
            $this->setContactError('Veuillez compléter tous les champs');
            header('Location: /contact');
            exit;
        }

        try {
            $this->contactService->createContact(
                $_POST['title'],
                $_POST['email'],
                $_POST['content'],
                (int) $_SESSION['idUser']
            );

            header('Location: /contact');
            $_SESSION['flash'] = [
                'message' => 'Votre demande à bien été envoyé',
                'type' => 'success'
            ];
            exit;
        } catch (\Exception $e) {
            $this->setContactError($e->getMessage());
            header('Location: /contact');
            exit;
        }
    }

    public function getContacts()
    {
        $contacts = $this->contactService->getContacts();
        $_SESSION['contacts'] = $contacts;
        header('Location /admin-contacts');
        exit;
    }
}

?>