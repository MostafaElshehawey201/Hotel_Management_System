<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAcceptLanguage
{
    public function handle(Request $request, Closure $next): Response
    {
        $accept_language = $request->header('accept-language');
        if($accept_language && in_array($accept_language , ['ar' , 'en'])){
            app()->setLocale($accept_language);
        };
        return $next($request);
    }
}
