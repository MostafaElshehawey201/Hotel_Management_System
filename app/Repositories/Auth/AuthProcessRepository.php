<?php

namespace App\Repositories\Auth;

use App\Interfaces\Auth\AuthLoginRepositoryInterface;
use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthResetPasswordEmailRepositoryInterface;
use App\Interfaces\Auth\AuthResetPasswordRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthProcessRepository implements AuthRegisterRepositoryInterface , AuthLoginRepositoryInterface , AuthResetPasswordRepositoryInterface , AuthResetPasswordEmailRepositoryInterface

{ 
    /**
     * Create a new class instance.
     */

    public function __construct() {}

    public function emailExists($email){
        return User::where('email' , $email)->exists();
    }

    public function phoneExists($phone){
        return User::where('phone' , $phone)->exists();
    }

    public function create($authRegisterDTO){
        return User::create([
            "name" => $authRegisterDTO->name,
            "email" => $authRegisterDTO->email,
            "phone" => $authRegisterDTO->phone,
            "password" => Hash::make($authRegisterDTO->password)
        ]);
    }

    public function checkEmail($email){
        return User::where('email' , $email)->exists();
    }

    public function emailUser($email){
        return User::where('email' , $email)->first();
    }

    public function checkPhone($phone)
    {
        return User::where('phone' , $phone)->exists();
    }

    public function phoneUser($phone){
        return User::where('phone' , $phone)->first();
    }

    public function checkPassword($authLoginDTO , $user){
        return Hash::check($authLoginDTO->password , $user->password);
    }

    public function resetPassword($resetPasswordDTO){
        return User::where('phone' , $resetPasswordDTO->login['phone'])->first();
    }
    
    public function resetPasswordEmail($resetPasswordDTO){
        return User::where('email' , $resetPasswordDTO->login['email'])->first();
    }
}
