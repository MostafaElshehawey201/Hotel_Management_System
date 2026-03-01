<?php

namespace App\Interfaces\Strategies\Auth;

interface AuthResetPasswordStrategiesInterface
{
    public function resetPassword($resetPasswordDTO);
}
