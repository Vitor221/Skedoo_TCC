<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasFactory, HasApiTokens;
    
    protected $table = "tb_login";
    protected $primaryKey = "cd_login";

    public function getAuthPassword(){
        return $this->cd_senha;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nm_login', 'cd_senha',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'cd_senha',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['cd_senha'] = bcrypt($value);
    }

    
}
