<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::middleware('ApiAcceptLanguage')->prefix('auth')
    ->controller(AuthController::class)->
    group(function(){
        Route::post('register' , 'register');
    });
});
