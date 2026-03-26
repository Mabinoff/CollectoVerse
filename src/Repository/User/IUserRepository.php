<?php

namespace App\Repository\User;

use App\Model\User\UserSql;

interface IUserRepository
{
    public function createUser(
        string $username,
        string $email,
        string $password,
        int $idRole,
    ): void;

    public function getWithUsernameOrEmail(string $login, string $role): ?UserSql;

    public function getUserWithIdUser(int $idUser): ?UserSql;

    public function getUserWithUsername(string $username): ?UserSql;

    public function getUserWithEmail(string $email): ?UserSql;

    public function changeEmail(string $email, int $idUser);

    public function changeUsername(string $username, int $idUser);

    public function changePassword(string $password, int $idUser);

    public function deleteUser(int $idUser);

    /**
     * @return UserSql[]
     */
    public function getUsers(): array;
}
?>