<?php

namespace App\Repository\Contact;

use App\Core\Database;
use App\Model\Contact\ContactSql;
use DateTime;

class ContactRepository implements IContactRepository
{
    public function __construct(
        private readonly Database $databasePdo
    ) {}

    public function createContact(string $title, string $email, string $message, int $idUser)
    {
        $query = "
            INSERT INTO Contact
            (title_contact, email_contact, content_contact, id_user)
            VALUES (?, ?, ?, ?)
        ";
        $params = [$title, $email, $message, $idUser];
        $this->databasePdo->exec($query, $params);
    }

    public function getContacts(): array
    {
        $query = 'SELECT * FROM Contact';
        $contacts = $this->databasePdo->getRows($query);
        return array_map(
            fn($contact) => new ContactSql($contact),
            $contacts
        );
    }

    public function seenContact(int $idContact, bool $isSeen)
    {
        $query = 'UPDATE Contact SET is_admin_seen = ?, updated_at = ? WHERE id_contact = ?';
        $params = [$isSeen, (new \DateTime())->format('Y-m-d H:i:s'), $idContact];
        $this->databasePdo->exec($query, $params);
    }

    public function deleteContact(int $idContact)
    {
        $query = 'DELETE FROM Contact WHERE id_contact = ?';
        $params = [$idContact];
        $this->databasePdo->exec($query, $params);
    }
}

?>