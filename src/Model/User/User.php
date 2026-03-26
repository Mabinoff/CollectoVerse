<?php

namespace App\Model\User;

class User
{
    private int $idUser;
    private int $idRole;
    private string $username;
    private string $password;
    private string $email;
    private \DateTime $createdAt;

    public function __construct(
        int $idUser,
        int $idRole,
        string $username,
        string $password,
        string $email,
        \DateTime $createdAt
    ) {
        $this->idUser = $idUser;
        $this->idRole = $idRole;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->createdAt = $createdAt;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function getIdRole(): int
    {
        return $this->idRole;
    }

    public function setIdRole(int $idRole)
    {
        $this->idRole = $idRole;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }
}

?>