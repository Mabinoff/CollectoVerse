<?php

namespace App\Service\User;

use App\Model\User\User;

interface IUserService
{
    public function createUser(string $username, string $email, string $password, int $idrole): User;

    public function login(string $login, string $password, string $role): User;

    public function getUserWithUsername(string $username): User;

    public function getUserWithEmail(string $email): User;

    public function checkEmailIfAlreadyUse(string $email);

    public function checkUsernameIfAlreadyUse(string $username);

    public function changeEmail(string $email, int $idUser);

    public function changeUsername(string $username, int $idUser);

    public function changePassword(string $password, int $idUser);

    public function deleteUser(string $password, int $idUser);

    public function deleteUserWithoutPassword(int $idUser);

    /**
     * @return User[]
     */
    public function getUsers(): array;
}

?>