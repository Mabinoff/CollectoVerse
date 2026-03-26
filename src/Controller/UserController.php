<?php

namespace App\Controller;

use App\Helper\RegexHelper;
use App\Service\User\IUserService;
use App\UseCase\CreateUserUseCase;
use App\Model\User\User;
use App\Service\Email\ForgotPasswordEmailService;
use App\Service\Email\RegisterEmailService;

class UserController
{
    public function __construct(
        private readonly IUserService $userService,
        private readonly CreateUserUseCase $createUserUseCase,
        private readonly RegisterEmailService $registerEmailService,
        private readonly ForgotPasswordEmailService $forgotPasswordEmailService
    ) {}

    private function responseClient(User $user)
    {
        $_SESSION['idUser'] = $user->getIdUser();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['email'] = $user->getEmail();
        header('Location: /collection');
    }

    private function setRegisterError(string $error)
    {
        $_SESSION['registerError'] = $error;
    }

    private function setRegisterCodeError(string $error)
    {
        $_SESSION['registerCodeError'] = $error;
    }

    private function setLoginError(string $error)
    {
        $_SESSION['loginError'] = $error;
    }

    private function setForgotPasswordError(string $error)
    {
        $_SESSION['forgotPasswordError'] = $error;
    }

    private function setForgotPasswordCodeError(string $error)
    {
        $_SESSION['forgotPasswordCodeError'] = $error;
    }

    private function setForgotPasswordNewError(string $error)
    {
        $_SESSION['forgotPasswordNewError'] = $error;
    }

    private function setDeleteAccountError(string $error)
    {
        $_SESSION['deleteAccountError'] = $error;
    }

    public function login() {
        if (!isset($_POST['login'], $_POST['password'])) {
            $this->setLoginError('Veuillez compléter tous les champs');
            header('Location: /login');
            exit;
        }

        try {
            $user = $this->userService->login(
                $_POST['login'],
                $_POST['password'],
                'user'
            );

            $this->responseClient($user);
        } catch (\Exception $e) {
            $this->setLoginError($e->getMessage());
            header('Location: /login');
        }
    }

    public function register()
    {
        try {
            if (!isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {
                $this->setRegisterError('Veuillez compléter tous les champs.');
                header('Location: /register');
                exit;
            }
    
            if ($_POST['password'] !== $_POST['confirmPassword']) {
                $this->setRegisterError('Les mots de passe sont différents');
                header('Location: /register');
                exit;
            }
    
            RegexHelper::checkEmail($_POST['email']);

            $this->userService->checkUsernameIfAlreadyUse($_POST['username']);
            $this->userService->checkEmailIfAlreadyUse($_POST['email']);
    
            $this->registerEmailService->createRequest($_POST['username'], $_POST['email'], $_POST['password']);
            $_SESSION['registerEmail'] = $_POST['email'];
            header('Location: /register-code');
        } catch (\Exception $e) {
            $this->setRegisterError($e->getMessage());
            header('Location: /register');
        }
    }

    public function registerCode()
    {
        try {
            if (!isset($_SESSION['registerEmail'])) {
                header('Location: /register');
                exit;
            }

            if (!isset($_POST['code'])) {
                $this->setRegisterCodeError('Veuillez entrer le code');
                exit;
            }
    
            $code = (int) ($_POST['code'] ?? 0);
            $user = $this->registerEmailService->verifyRequest(
                $_SESSION['registerEmail'],
                $code
            );

            unset($_SESSION['registerEmail']);

            $userObject = $this->createUserUseCase->execute(
                $user['username'],
                $user['email'],
                $user['password'],
            );
            
            $this->responseClient($userObject);
        } catch (\Exception $e) {
            $this->setRegisterCodeError($e->getMessage());
            header('Location: /register-code');
        }
    }

    public function forgotPassword()
    {
        try {
            $email = $_POST['email'] ?? null;
            if (!$email) {
                $this->setForgotPasswordError('Veuillez entrer une adresse email');
                exit;
            }

            $this->userService->getUserWithEmail($email);

            $this->forgotPasswordEmailService->createRequest($email);

            $_SESSION['forgotPasswordEmail'] = $email;

            header('Location: /forgot-password-code');
            exit;
        } catch (\Exception $e) {
            $this->setForgotPasswordError($e->getMessage());
            header('Location: /forgot-password');
        }
    }

    public function forgotPasswordCode()
    {
        $code = $_POST['code'] ?? null;
        $email = $_SESSION['forgotPasswordEmail'] ?? null;

        if (!$code || !$email) {
            $this->setForgotPasswordCodeError('Veuillez entrer le code reçu par email');
            exit;
        }

        try {
            $this->forgotPasswordEmailService->verifyRequest($email, (int) $code);

            $_SESSION['forgotPasswordNew'] = $email;
            unset($_SESSION['forgotPasswordEmail']);

            header('Location: /forgot-password-new');
            exit;
        } catch (\Exception $e) {
            $this->setForgotPasswordCodeError($e->getMessage());
            header('Location: /forgot-password-code');
        }
    }


    public function forgotPasswordNew()
    {
        $email = $_SESSION['forgotPasswordNew'] ?? null;
        if (!$email) {
            header('Location: /');
            exit;
        }

        $password = $_POST['password'] ?? null;
        $confirmPassword = $_POST['confirmPassword'] ?? null;

        if (!$password || !$confirmPassword) {
            $this->setForgotPasswordNewError('Veuillez entrer votre nouveau mot de passe');
            header('Location: /forgot-password-new');
            exit;
        }

        if ($password !== $confirmPassword) {
            $this->setForgotPasswordNewError('Les mots de passe ne correspondent pas');
            header('Location: /forgot-password-new');
            exit;
        }

        $user = $this->userService->getUserWithEmail($email);
        $this->userService->changePassword($password, $user->getIdUser());

        unset($_SESSION['forgotPasswordNew']);

        header('Location: /login');
        exit;
    }


    private function logoutFn()
    {
        unset($_SESSION['idUser']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['categoriesCreate']);
        unset($_SESSION['items']);
        session_destroy();
        header('Location: /');
    }

    public function logout()
    {
        $this->logoutFn();
    }

    public function deleteAccount()
    {
        try {
            $password = $_POST['password'] ?? null;
    
            if (!$password) {
                $this->setDeleteAccountError('Mot de passe invalid');
                exit;
            }

            $this->userService->deleteUser($password, $_SESSION['idUser']);
            $this->logoutFn();
        } catch (\Exception $e) {
            $this->setDeleteAccountError($e->getMessage());
            header('Location: /delete-account');
        }
    }
}

?>