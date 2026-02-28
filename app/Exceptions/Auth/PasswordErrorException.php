<?php

namespace App\Exceptions\Auth;

use Exception;

class PasswordErrorException extends Exception
{
    public function __construct($code)
    {
        return parent::__construct(__('messages.password.error') , $code);
    }
}
