<?php

namespace App\Interfaces\Auth;

use App\Http\DTO\Auth\AuthRegisterDTO;

interface AuthRegisterServiceInterface
{
    public function register(AuthRegisterDTO $authRegisterDTO);
}
