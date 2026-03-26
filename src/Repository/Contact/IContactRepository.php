<?php

namespace App\Repository\Contact;

interface IContactRepository
{
    public function createContact(string $title, string $email, string $message, int $idUser);

    /**
     * @return ContactSql[]
     */
    public function getContacts(): array;

    public function seenContact(int $idContact, bool $isSeen);

    public function deleteContact(int $idContact);
}

?>