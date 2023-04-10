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
        // return $next($request);
        // session()->has('login.cd_acesso') && session()->('login.cd_acesso') == 1 ? return redirect()->route('instituicao') : abort(402, 'Acesso negado');
        $cd_acesso = session()->get('login.cd_acesso');

        if(session()->has('login') && $cd_acesso == 1) {
            return $next($request);
        } else if($cd_acesso == 2 || $cd_acesso == 3){
            return redirect()->back();
        }


    }
}
