<?php

namespace App\Interfaces\Auth;

interface AuthResetPasswordRepositoryInterface
{
    public function resetPasswordEmail($resetPasswordDTO);
}
