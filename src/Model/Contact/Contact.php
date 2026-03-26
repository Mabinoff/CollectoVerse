<?php

namespace App\Model\Contact;

class Contact
{
    private int $idContact;
    private int $idUser;
    private string $title;
    private string $email;
    private string $content;
    private bool $isAdminSeen;
    public bool $adminSeen;
    private \DateTime $createdAt;

    public function __construct(
        int $idContact,
        int $idUser,
        string $title,
        string $email,
        string $content,
        bool $isAdminSeen,
        \DateTime $createdAt
    ) {
        $this->idContact = $idContact;
        $this->idUser = $idUser;
        $this->title = $title;
        $this->email = $email;
        $this->content = $content;
        $this->isAdminSeen = $isAdminSeen;
        $this->createdAt = $createdAt;
    }

    public function getIdContact(): int
    {
        return $this->idContact;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content) {
        $this->content = $content;
    }

    public function getIsAdminSeen(): bool
    {
        return $this->isAdminSeen;
    }

    public function setIsAdminSeen(bool $isAdminSeen)
    {
        $this->isAdminSeen = $isAdminSeen;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }
}

?>