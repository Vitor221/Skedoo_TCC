<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TbCardapio extends Model
{
    protected $table = 'tb_cardapio';
    protected $primaryKey = 'id_img';
    public $incrementing = true;
	public $timestamps = false;

    protected $fillable = [
        'id_img', 'img'
    ];
}
