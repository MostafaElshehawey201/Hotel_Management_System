<?php
    return[
        "name" => [
            "required" => "The name field is required",
            "string" => "The name field must be a string",
            "min" => "The name field must be at least 3 characters",
            "max" => "The name field must not exceed 255 characters",
        ],
        "email" => [
            "required" => "The email field is required",
            "email" => "The email field must be a valid email address",
            "unique" => "The email has already been taken",
        ],
        "phone" => [
            "required" => "The phone field is required",
            "digits_between" => "The phone field must be between 10 and 15 digits",
            "unique" => "The phone number has already been taken",
        ],
        "password" => [
            "required" => "The password field is required",
            "string" => "The password field must be a string",
            "min" => "The password field must be at least 8 characters",
            "confirmed" => "The password confirmation does not match",
        ],
        "login" => [
            "required" => "The login field is required",
            "string" => "The login field must be a string",
        ]
    ]
?>