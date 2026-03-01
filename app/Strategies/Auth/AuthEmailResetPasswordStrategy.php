<?php

namespace App\Strategies\Auth;

use App\Interfaces\Auth\AuthResetPasswordEmailRepositoryInterface;
use App\Interfaces\Strategies\Auth\AuthResetPasswordStrategiesInterface;

class AuthEmailResetPasswordStrategy implements AuthResetPasswordStrategiesInterface
{
    /**
     * Create a new class instance.
     */


     public function __construct(private AuthResetPasswordEmailRepositoryInterface $auth_reset_password_email_repository_interface)
    {
    }

    public function resetPassword($resetPasswordDTO){
        // return User::where('email' , $resetPasswordDTO->login)->first();
        return $this->auth_reset_password_email_repository_interface->resetPasswordEmail($resetPasswordDTO);
    }
}
