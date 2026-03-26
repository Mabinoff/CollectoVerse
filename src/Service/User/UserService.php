<?php

namespace App\Service\User;

use App\Helper\RegexHelper;
use App\Repository\User\IUserRepository;
use App\Model\User\User;

class UserService implements IUserService
{
    private int $USERNAME_MAX_SIZE = 16;
    private int $EMAIL_MAX_SIZE = 320;
    private int $PASSWORD_MAX_SIZE = 1024;

    public function __construct(
        private readonly IUserRepository $userRepository
    ) {}

    public function createUser(string $username, string $email, string $password, int $idRole): User
    {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        $this->userRepository->createUser($username, $email, $passwordHashed, $idRole);
        return $this->getUserWithUsername($username);
    }

    public function login(string $login, string $password, string $role='user'): User
    {
        $user = $this->userRepository->getWithUsernameOrEmail($login, $role);
        if ($user) {
            if (password_verify($password, $user->password)) {
                return new User(
                    $user->id_user,
                    $user->id_role,
                    $user->username,
                    $user->password,
                    $user->email,
                    $user->created_at
                );
            }
            throw new \Exception("Nom d'utilisateur ou mot de passe incorrecte");
        }
        throw new \Exception("Nom d'utilisateur ou mot de passe incorrecte");
    }

    public function getUserWithUsername(string $username): User
    {
        $user = $this->userRepository->getUserWithUsername($username);
        if ($user) {
            return new User(
                $user->id_user,
                $user->id_role,
                $user->username,
                $user->password,
                $user->email,
                $user->created_at
            );
        }
        throw new \Exception('Utilisateur introuvable');
    }

    public function getUserWithEmail(string $email): User
    {
        $user = $this->userRepository->getUserWithEmail($email);
        if ($user) {
            return new User(
                $user->id_user,
                $user->id_role,
                $user->username,
                $user->password,
                $user->email,
                $user->created_at
            );
        }
        throw new \Exception('Utilisateur introuvable');
    }

    public function checkUsernameIfAlreadyUse(string $username)
    {
         try {
            $this->getUserWithUsername($username);
        } catch (\Exception $e) {
            return;
        }
        throw new \Exception("Le nom d'utilisateur est déjà utilisé", 1);
    }

    public function checkEmailIfAlreadyUse(string $email)
    {
        try {
            $this->getUserWithEmail($email);
        } catch (\Exception $e) {
            return;
        }
        throw new \Exception("L'adresse email est déjà utilisé");
    }

    public function changeEmail(string $email, int $idUser)
    {
        RegexHelper::checkEmail($email);
        if (strlen($email) > $this->EMAIL_MAX_SIZE) {
            throw new \Exception("L'adresse email ne doit pas dépasser " . $this->EMAIL_MAX_SIZE . " caractères");
        }

        $this->userRepository->changeEmail($email, $idUser);
    }

    public function changeUsername(string $username, int $idUser)
    {
        if (strlen($username) > $this->USERNAME_MAX_SIZE) {
            throw new \Exception("Le nom d'utilisateur ne doit pas dépasser " . $this->USERNAME_MAX_SIZE . " caractères");
        }

        $this->userRepository->changeUsername($username, $idUser);
    }

    public function changePassword(string $password, int $idUser)
    {
        if (strlen($password) > $this->PASSWORD_MAX_SIZE) {
            throw new \Exception("Le mot de passe ne doit pas dépasser " . $this->PASSWORD_MAX_SIZE . " caractères");
        }

        $this->userRepository->changePassword(password_hash($password, PASSWORD_DEFAULT), $idUser);
    }

    public function deleteUser(string $password, int $idUser)
    {
        $user = $this->userRepository->getUserWithIdUser($idUser);
        if (!$user) return;

        if (password_verify($password, $user->password)) {
            $this->userRepository->deleteUser($idUser);
            return;
        }
        throw new \Exception('Mot de passe invalid');
    }

    public function deleteUserWithoutPassword(int $idUser)
    {
        $this->userRepository->deleteUser($idUser);
    }

    public function getUsers(): array
    {
        $usersSql = $this->userRepository->getUsers();
        return array_map(
            fn($user) => new User(
                $user->id_user,
                $user->id_role,
                $user->username,
                $user->password,
                $user->email,
                $user->created_at
            ),
            $usersSql
        );
    }
}

?>