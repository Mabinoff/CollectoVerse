<?php

namespace App\Repository\User;

use App\Core\Database;
use App\Model\User\UserSql;

class UserRepository implements IUserRepository
{
    public function __construct(
        private readonly Database $databasePdo
    ) {}

    public function createUser(
        string $username,
        string $email,
        string $password,
        int $idRole,
    ): void
    {
        $query = 'INSERT INTO User (username, email, password, id_role) VALUES (?, ?, ?, ?)';
        $params = [$username, $email, $password, $idRole];
        $this->databasePdo->exec($query, $params);
    }

    public function getUserWithEmail(string $email): ?UserSql
    {
        $query = "
            SELECT
                *
            FROM User
            WHERE email = ?
        ";
        $params = [$email];
        $data = $this->databasePdo->getRow($query, $params);
        if ($data) {
            return new UserSql($data);
        };
        return null;
    }

    public function getUserWithUsername(string $username): ?UserSql
    {
        $query = "
            SELECT
                *
            FROM User
            WHERE username = ?
        ";
        $params = [$username];
        $data = $this->databasePdo->getRow($query, $params);
        if ($data) {
            return new UserSql($data);
        };
        return null;
    }

    public function getUserWithIdUser(int $idUser): ?UserSql
    {
        $query = 'SELECT * FROM User WHERE id_user = ?';
        $params = [$idUser];
        $data = $this->databasePdo->getRow($query, $params);
        if ($data) {
            return new UserSql($data);
        };
        return null;
    }

    public function getWithUsernameOrEmail(string $login, string $role='user'): ?UserSql
    {
        $query = "
            SELECT
                u.*
            FROM User u
            JOIN Role r ON r.id_role = u.id_role
            WHERE (username = :login OR email = :login) AND r.name_role = :role
        ";
        $params = ['login' => $login, 'role' => $role];
        $data = $this->databasePdo->getRow($query, $params);
        if ($data) {
            return new UserSql($data);
        };
        return null;
    }

    public function changeEmail(string $email, int $idUser)
    {
        $query = 'UPDATE User SET email = ? WHERE id_user = ?';
        $params = [$email, $idUser];
        $this->databasePdo->exec($query, $params);
    }

    public function changeUsername(string $username, int $idUser)
    {
        $query = 'UPDATE User SET username = ? WHERE id_user = ?';
        $params = [$username, $idUser];
        $this->databasePdo->exec($query, $params);
    }

    public function changePassword(string $password, int $idUser)
    {
        $query = 'UPDATE User SET password = ? WHERE id_user = ?';
        $params = [$password, $idUser];
        $this->databasePdo->exec($query, $params);
    }

    public function deleteUser(int $idUser)
    {
        $query = 'DELETE FROM User WHERE id_user = ?';
        $params = [$idUser];
        $this->databasePdo->exec($query, $params);
    }

    public function getUsers(): array
    {
        $query = 'SELECT * FROM User';
        $users = $this->databasePdo->getRows($query);
        return array_map(
            fn($user) => new UserSql($user),
            $users
        );
    }
}

?>