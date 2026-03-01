<?php

namespace App\Interfaces\Auth;

interface AuthResetPasswordInterface
{
    public function resetPassword($authResetPasswordDTO);
}
