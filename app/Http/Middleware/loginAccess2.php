<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class loginAccess2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cd_acesso = session()->get('login.cd_acesso');

        if(session()->has('login') && $cd_acesso == 2){
            return $next($request);
        } else if($cd_acesso == 1 || $cd_acesso == 3){
            return redirect()->back();
        }
    }
}
