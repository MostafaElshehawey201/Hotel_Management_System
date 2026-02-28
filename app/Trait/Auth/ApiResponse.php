<?php

namespace App\Trait\Auth;

trait ApiResponse
{
    public function success($apiAuthRegister, $code)
    {
        return response()->json([
            "success" => "true",
            "data" => $apiAuthRegister,
            "errors" => null,
        ], $code);
    }

    public function error($e, $code)
    {
        return response()->json([
            "success" => "false",
            "data" => null,
            "errors" => $e->getMessage(),
        ], $code);
    }
}
