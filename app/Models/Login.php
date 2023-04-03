<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = 'tb_login';

    protected $fillable  = [
        'nm_login',
        'cd_senha'
    ];
    
}
