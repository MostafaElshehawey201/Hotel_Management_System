<?php

namespace App\Exceptions\Auth;

use Exception;

class PhoneExistsException extends Exception
{
    public function __construct($code){
        parent::__construct(__('messages.phone.exists') , $code);
    }
}
