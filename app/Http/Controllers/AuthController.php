<?php

namespace App\Http\Controllers;

use App\Exceptions\Auth\EmailExistsException;
use App\Exceptions\Auth\EmailNotFoundException;
use App\Exceptions\Auth\PasswordErrorException;
use App\Exceptions\Auth\PhoneExistsException;
use App\Exceptions\Auth\PhoneNotFoundException;
use App\Http\DTO\Auth\AuthLoginDTO;
use App\Http\DTO\Auth\AuthRegisterDTO;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Http\Resources\Auth\AuthLoginResource;
use App\Http\Resources\Auth\AuthRegisterResource;
use App\Interfaces\Auth\AuthLoginServiceInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;
use App\Trait\Auth\ApiResponse;
use Throwable;

// use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponse;

    public function __construct(
        private AuthRegisterServiceInterface $auth_register_service_interface,
        private AuthLoginServiceInterface $auth_login_service_interface
    ) {}

    public function register(AuthRegisterRequest $authRegisterRequest)
    {
        try {
            $validation = $authRegisterRequest->validated();
            $authRegisterDTO = new AuthRegisterDTO($validation);
            $register = $this->auth_register_service_interface->register($authRegisterDTO);
            $apiAuthRegister = new AuthRegisterResource($register);
            return $this->success($apiAuthRegister, 201);
        } catch (EmailExistsException $e) {
            return $this->error($e, 409);
        } catch (PhoneExistsException $e) {
            return $this->error($e, 409);
        } catch (Throwable $e) {
            return $this->error($e, 500);
        }
    }

    public function login(AuthLoginRequest $authLoginRequest)
    {
        try {
            $validation = $authLoginRequest->validated();
            $authLoginDTO = new AuthLoginDTO($validation);
            $token = $this->auth_login_service_interface->login($authLoginDTO);
            $apiTokenResource = new AuthLoginResource($token);
            return $this->success($apiTokenResource, 201);
        } catch (EmailNotFoundException $e) {
            return $this->error($e, 404);
        } catch (PhoneNotFoundException $e) {
            return $this->error($e, 404);
        } catch (PasswordErrorException $e) {
            return $this->error($e, 401);
        } catch (Throwable $e) {
            return $this->error($e, 500);
        }
    }
}
