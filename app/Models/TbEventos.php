<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbEventos extends Model
{
    use HasFactory;

    protected $table = 'tb_eventos';
    protected $fillable = ['titulo', 'inicio', 'fim'];
}
