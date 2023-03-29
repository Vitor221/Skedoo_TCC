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
            'cd_senha'  =>  'required',
        ]);

        $credentials = $request->only('nm_login', 'cd_senha');

        if(Auth::attempt($credentials)){
            return redirect()->route('instituicao');
        }
    }
}
