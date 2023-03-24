<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function autenticar(Request $request){
        $this->autenticarPerfil($request);
        $this->validarPerfil($request);

        session()->regenerate();
        session(['key' => env('TOKEN_ADMIN')]);
        return redirect()->route('instituicao');

    }

    public function autenticarPerfil(Request $request){
        try {
            config()->set('database.connection.mysql.username', \strtoupper($request->user));
            config()->set('database.connection.mysql.password', $request->password);
            DB::connection('mysql');
            dd($request);
        } catch (\Exception $e){
            $error = 'Erro no sistema';
            dd($error);
        }
    }


    public function validarPerfil(Request $request){
        config()->set('database.connections.mysql.username', env('DB_USERNAME'));
        config()->set('database.connections.mysql.password', env('DB_PASSWORD'));

        $perfil = DB::connection('mysql')
            ->table('tb_login')
            ->select('cd_login', 'nm_login', 'cd_senha', 'cd_responsavel')
            ->get();
    }
}
