<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\EmailExistsException;
use App\Exceptions\Auth\PhoneExistsException;
use App\Http\DTO\Auth\AuthRegisterDTO;
use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;

class AuthRegisterService implements AuthRegisterServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected AuthRegisterRepositoryInterface $authRegisterRepositoryInterface)
    {
        //
    }


    public function register(AuthRegisterDTO $authRegisterDTO){
        $email = $this->authRegisterRepositoryInterface->emailExists($authRegisterDTO->email); 
        if($email == true){
            throw new EmailExistsException(409);
        }

        $phone = $this->authRegisterRepositoryInterface->phoneExists($authRegisterDTO->phone);
        if($phone == true){
            throw new PhoneExistsException(409);
        }

        return $this->authRegisterRepositoryInterface->create($authRegisterDTO);
    }

   
}
