<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TbBairro extends Model
{
	protected $table = 'tb_bairro';
	protected $primaryKey = 'cd_bairro';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_bairro' => 'int',
		'cd_cidade' => 'int'
	];

	protected $fillable = [
		'nm_bairro',
		'cd_cidade'
	];

	public function tb_cidade()
	{
		return $this->belongsTo(TbCidade::class, 'cd_cidade');
	}

	public function tb_enderecos()
	{
		return $this->hasMany(TbEndereco::class, 'cd_bairro');
	}
}
