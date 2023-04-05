<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Login;

class accessLogins
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
        // if(session()->has('login') && session()->get('login.cd_acesso') == 1) {
        //     return redirect('instituicao');
        // } else {
        //     abort(403, 'Acesso negado');
        // }


    }
}
