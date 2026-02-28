<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\EmailExistsException;
use App\Exceptions\Auth\EmailNotFoundException;
use App\Exceptions\Auth\PasswordErrorException;
use App\Exceptions\Auth\PhoneExistsException;
use App\Exceptions\Auth\PhoneNotFoundException;
use App\Http\DTO\Auth\AuthRegisterDTO;
use App\Interfaces\Auth\AuthLoginRepositoryInterface;
use App\Interfaces\Auth\AuthLoginServiceInterface;
use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;

class AuthProcessService implements AuthRegisterServiceInterface, AuthLoginServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected AuthRegisterRepositoryInterface $authRegisterRepositoryInterface,
        protected AuthLoginRepositoryInterface $auth_login_repository_interface,
    ) {
        //
    }


    public function register(AuthRegisterDTO $authRegisterDTO)
    {
        $email = $this->authRegisterRepositoryInterface->emailExists($authRegisterDTO->email);
        if ($email == true) {
            throw new EmailExistsException(409);
        }

        $phone = $this->authRegisterRepositoryInterface->phoneExists($authRegisterDTO->phone);
        if ($phone == true) {
            throw new PhoneExistsException(409);
        }

        return $this->authRegisterRepositoryInterface->create($authRegisterDTO);
    }

    public function login($authLoginDTO)
    {
        // check email 
        $email = filter_var($authLoginDTO->login, FILTER_VALIDATE_EMAIL);
        if ($email) {
            $return = $this->auth_login_repository_interface->checkEmail($email);
            if ($return == false) {
                throw new EmailNotFoundException(404);
            }
            $user = $this->auth_login_repository_interface->emailUser($email);
            $password = $this->auth_login_repository_interface->checkPassword($authLoginDTO, $user);
            if (!$password) {
                throw new PasswordErrorException(401);
            }
            return $user->createToken('authToken')->plainTextToken;
        }

        // check phone
        $phone = preg_match("/^[0-9]{11}+$/", $authLoginDTO->login);
        if ($phone) {
            $return = $this->auth_login_repository_interface->checkPhone($authLoginDTO->login);
            if ($return == false) {
                throw new PhoneNotFoundException(404);
            }
            $user = $this->auth_login_repository_interface->phoneUser($phone);
            $password = $this->auth_login_repository_interface->checkPassword($authLoginDTO , $user);
            if(!$password){
                throw new PasswordErrorException(401);
            }
            return $user->createToken('authToken')->plainTextToken;
        }
    }
}
