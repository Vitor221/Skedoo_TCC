<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbLogin extends Model
{
    use HasFactory;

    protected $table = 'tb_login';
	protected $primaryKey = 'cd_login';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_login' => 'int',
		'cd_responsavel' => 'int',
		'cd_acesso'	=> 'int'
	];

	protected $fillable = [
		'nm_login',
		'cd_senha',
		'cd_responsavel',
		'cd_acesso',
	];

	public function tb_responsavel()
	{
        return $this->belongsTo(TbResponsavel::class, 'cd_responsavel');
    }
}
