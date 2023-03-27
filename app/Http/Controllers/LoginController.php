<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;

class LoginController extends Controller
{
    public function store(Request $request) {

        $validated = $request->validate([
            'nm_login'      =>  'required',
            'cd_senha'  =>  'required',
        ]);

        $logget = Auth::attempt($validated);

        if($logget){
            return redirect()->intended('login_pags.instituicao');
        }

        return back()->with('error_login', 'Ocorreu um erro ao fazer o login, tente novamente mais tarde');
    }
}
