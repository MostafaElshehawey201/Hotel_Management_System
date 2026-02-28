<?php

namespace App\Http\Controllers;

use App\Exceptions\Auth\EmailExistsException;
use App\Exceptions\Auth\PhoneExistsException;
use App\Http\DTO\Auth\AuthRegisterDTO;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Http\Resources\Auth\AuthRegisterResource;
use App\Interfaces\Auth\AuthRegisterServiceInterface;
use App\Trait\Auth\ApiResponse;
use Throwable;

// use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponse;

    public function __construct(private AuthRegisterServiceInterface $auth_register_service_interface) {}
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
}
