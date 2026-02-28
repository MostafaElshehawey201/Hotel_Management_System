<?php

namespace App\Http\DTO\Auth;

class AuthLoginDTO
{
    public $login;
    public $password;
    public function __construct($validation)
    {
        $this->login = $validation['login'];
        $this->password = $validation['password'];
    }
}
