<?php

namespace App\Exceptions\Auth;

use Exception;

class EmailNotFoundException extends Exception
{
    public function __construct($code)
    {
        parent::__construct((__('messages.email.notFound')), $code);
        
    }
}
