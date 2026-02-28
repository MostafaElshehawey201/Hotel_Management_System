<?php

namespace App\Interfaces\Auth;

interface AuthRegisterRepositoryInterface
{
    public function emailExists($email);
    public function phoneExists($phone);
    public function create($authRegisterDTO);
}
