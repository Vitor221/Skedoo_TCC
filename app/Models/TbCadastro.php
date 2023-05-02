<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TbCadastro extends Model
{
	protected $table = 'tb_cadastro';
	protected $primaryKey = 'cd_cadastro';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'cd_cadastro' => 'int'
	];

	protected $fillable = [
		'nm_login',
		'cd_senha'
	];

	public function tb_instituicao()
	{
		return $this->hasMany(TbInstituicao::class, 'cd_cadastro');
	}

	public function tb_profissional()
	{
		return $this->hasMany(TbProfissional::class, 'cd_cadastro');
	}

	public function tb_responsavel()
	{
		return $this->hasMany(TbResponsavel::class, 'cd_cadastro');
	}
}
