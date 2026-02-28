<?php

namespace App\Repositories\Auth;

use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRegisterRepository implements AuthRegisterRepositoryInterface
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
    
}
