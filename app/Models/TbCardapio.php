<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TbCardapio extends Model
{
    protected $table = 'tb_cardapio';
    protected $primaryKey = 'id_cardapio';
    public $incrementing = true;
	public $timestamps = false;

    protected $casts = [
        'id_cardapio'=> 'int',
        
    ];

    protected $fillable = [
        'dt_cardapio',
        'nm_prato',
       'desc_prato',
        'cd_cor',
        'img_prato',
        'nm_sobremessa',
        'desc_sobremessa',
        'img_sobremssa',
        'img_pdf'
    ];
};

		