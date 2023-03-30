<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'nm_login'  =>  'required',
            'cd_senha'  =>  'required'
        ]);

        $nm_login = $request->input('nm_login');
        $cd_senha = $request->input('cd_senha');

        if(Auth::attempt(['nm_login' => $nm_login, 'cd_login' => $cd_senha])){
            $user = User::where('nm_login', $nm_login)->first();
            Auth::login($user);
            return redirect('contato');
        } else {
            return redirect()->back()->with('erro', 'Usuário ou senha inválido');
        }

        // $credentials = $request->validate([
        //     'nm_login'  =>  ['required'],
        //     'cd_senha'  =>  ['required']
        // ]);

        // if(Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('contato');
        // } else {
        //     return redirect()->back()->with('erro', 'Usuário ou senha inválido');
        // }
        }
}
