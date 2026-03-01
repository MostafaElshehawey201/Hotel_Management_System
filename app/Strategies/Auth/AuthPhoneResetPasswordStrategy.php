<?php

namespace App\Strategies\Auth;

use App\Interfaces\Auth\AuthResetPasswordRepositoryInterface;
use App\Interfaces\Strategies\Auth\AuthResetPasswordStrategiesInterface;

class AuthPhoneResetPasswordStrategy implements AuthResetPasswordStrategiesInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(private AuthResetPasswordRepositoryInterface $auth_reset_password_repository_interface)
    {
        //
    }

    public function resetPassword($resetPasswordDTO){
        $this->auth_reset_password_repository_interface->resetPassword($resetPasswordDTO);
    }
}
