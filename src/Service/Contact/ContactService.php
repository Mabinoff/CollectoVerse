<?php

namespace App\Service\Contact;

use App\Helper\RegexHelper;
use App\Repository\Contact\IContactRepository;
use App\Model\Contact\Contact;
use App\Model\Contact\ContactSql;

class ContactService implements IContactService
{
    private int $TITLE_MAX_SIZE = 32;
    private int $EMAIL_MAX_SIZE = 320;
    private int $CONTENT_MAX_SIZE = 1024;

    public function __construct(
        private readonly IContactRepository $contactRepository
    ) {}

    public function createContact(string $title, string $email, string $message, int $idUser)
    {
        if (strlen($title) > $this->TITLE_MAX_SIZE) {
            throw new \Exception("Le title ne doit pas dépasser " . $this->TITLE_MAX_SIZE . " caractères");
        }

        if (strlen($email) > $this->EMAIL_MAX_SIZE) {
            throw new \Exception("L'adresse email ne doit pas dépasser " . $this->EMAIL_MAX_SIZE . " caractères");
        }

        if (strlen($message) > $this->CONTENT_MAX_SIZE) {
            throw new \Exception("Le contenue ne doit pas dépasser " . $this->CONTENT_MAX_SIZE . " caractères");
        }

        RegexHelper::checkEmail($email);

        $this->contactRepository->createContact($title, $email, $message, $idUser);
    }

    public function getContacts(): array
    {
        $contactsSql = $this->contactRepository->getContacts();
        return array_map(
            fn(ContactSql $c) => new Contact(
                $c->id_contact,
                $c->id_user,
                $c->title_contact,
                $c->email_contact,
                $c->content_contact,
                $c->is_admin_seen,
                $c->created_at
            ),
            $contactsSql
        );
    }

    public function seenContact(int $idContact, bool $isSeen)
    {
        $this->contactRepository->seenContact($idContact, $isSeen);
    }

    public function deleteContact(int $idContact)
    {
        $this->contactRepository->deleteContact($idContact);
    }
}

?>