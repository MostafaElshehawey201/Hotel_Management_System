<?php

namespace App\Interfaces\Auth;

interface AuthLoginServiceInterface
{
    public function login($authLoginDTO);
}
