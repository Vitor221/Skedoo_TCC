<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbCadastro
 * 
 * @property int $cd_cadastro
 * @property string|null $nm_login
 * @property string|null $cd_senha
 * 
 * @property Collection|TbInstituicao[] $tb_instituicaos
 * @property Collection|TbProfissional[] $tb_profissionals
 * @property Collection|TbResponsavel[] $tb_responsavels
 *
 * @package App\Models
 */
class TbCadastro extends Model
{
	protected $table = 'tb_cadastro';
	protected $primaryKey = 'cd_cadastro';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_cadastro' => 'int'
	];

	protected $fillable = [
		'nm_login',
		'cd_senha'
	];

	public function tb_instituicaos()
	{
		return $this->hasMany(TbInstituicao::class, 'cd_cadastro');
	}

	public function tb_profissionals()
	{
		return $this->hasMany(TbProfissional::class, 'cd_cadastro');
	}

	public function tb_responsavels()
	{
		return $this->hasMany(TbResponsavel::class, 'cd_cadastro');
	}
}
