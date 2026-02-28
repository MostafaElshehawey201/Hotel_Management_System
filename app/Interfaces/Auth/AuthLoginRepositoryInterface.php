<?php

namespace App\Interfaces\Auth;

interface AuthLoginRepositoryInterface
{
    public function checkEmail($email);

    public function emailUser($email);

    public function checkPhone($phone);

    public function phoneUser($phone);

    public function checkPassword($authLoginDTO , $user);
}
