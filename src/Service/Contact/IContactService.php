<?php

namespace App\Service\Contact;

interface IContactService
{
    public function createContact(string $title, string $email, string $message, int $idUser);

    /**
     * @return IContact[]
     */
    public function getContacts(): array;

    public function seenContact(int $idContact, bool $isSeen);

    public function deleteContact(int $idContact);
}

?>