<?php

namespace App\Model\User;

readonly class UserSql
{
    public int $id_user;
    public string $username;
    public string $email;
    public string $password;
    public int $id_role;
    public \DateTime $created_at;

    public function __construct(array $data)
    {
        $this->id_user = (int)$data['id_user'];
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->id_role = (int)$data['id_role'];
        $this->created_at = new \DateTime($data['created_at']);
    }
}

?>