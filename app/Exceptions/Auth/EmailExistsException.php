<?php

namespace App\Exceptions\Auth;

use Exception;

class EmailExistsException extends Exception
{
    public function __construct($code)
    {
        return parent::__construct(__('messages.email.exists'), $code);
    }
}
