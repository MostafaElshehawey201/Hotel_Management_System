<?php

namespace App\Interfaces\Auth;

interface AuthResetPasswordEmailRepositoryInterface
{
    public function resetPasswordEmail($resetPasswordDTO);
}
