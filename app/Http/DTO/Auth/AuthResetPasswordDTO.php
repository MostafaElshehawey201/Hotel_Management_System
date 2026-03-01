<?php
    namespace App\Http\DTO\Auth;


    class AuthResetPasswordDTO{
        public $login;

        public function __construct($authResetPasswordRequest)
        {
            $this->login = $authResetPasswordRequest['login'];
        }
         
    }
?>