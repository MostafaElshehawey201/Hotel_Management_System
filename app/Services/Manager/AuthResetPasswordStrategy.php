<?php

namespace App\Services\Manager;

use App\Interfaces\Strategies\Auth\AuthResetPasswordStrategiesInterface;
use App\Strategies\Auth\AuthEmailResetPasswordStrategy;
use App\Strategies\Auth\AuthPhoneResetPasswordStrategy;

class AuthResetPasswordStrategy implements AuthResetPasswordStrategiesInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function resetPassword($resetPasswordDTO){
        $phone = preg_match('/^[0-9]{11}$/', $resetPasswordDTO->login);
        if($phone){
            $strategy = new AuthPhoneResetPasswordStrategy($resetPasswordDTO);
            return $strategy->resetPassword($resetPasswordDTO);
        }
        $email = filter_var($resetPasswordDTO->login , FILTER_VALIDATE_EMAIL);
        if($email){
            $strategy = new AuthEmailResetPasswordStrategy($resetPasswordDTO);
            return $strategy->resetPassword($resetPasswordDTO);
        }
    }
}
