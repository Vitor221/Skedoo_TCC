<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbResponsavel
 * 
 * @property int $cd_responsavel
 * @property string|null $nm_responsavel
 * @property string|null $cd_cpf
 * @property int|null $cd_endereco
 * @property int|null $cd_cadastro
 * 
 * @property TbCadastro|null $tb_cadastro
 * @property TbEndereco|null $tb_endereco
 * @property Collection|TbAluno[] $tb_alunos
 * @property Collection|TbContato[] $tb_contatos
 * @property Collection|TbLogin[] $tb_logins
 * @property Collection|TbMensagem[] $tb_mensagems
 * @property TbResponsavelAluno $tb_responsavel_aluno
 *
 * @package App\Models
 */
class TbResponsavel extends Model
{
	protected $table = 'tb_responsavel';
	protected $primaryKey = 'cd_responsavel';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_responsavel' => 'int',
		'cd_endereco' => 'int',
		'cd_cadastro' => 'int'
	];

	protected $fillable = [
		'nm_responsavel',
		'cd_cpf',
		'cd_endereco',
		'cd_cadastro'
	];

	public function tb_cadastro()
	{
		return $this->belongsTo(TbCadastro::class, 'cd_cadastro');
	}

	public function tb_endereco()
	{
		return $this->belongsTo(TbEndereco::class, 'cd_endereco');
	}

	public function tb_alunos()
	{
		return $this->hasMany(TbAluno::class, 'cd_responsavel');
	}

	public function tb_contatos()
	{
		return $this->hasMany(TbContato::class, 'cd_responsavel');
	}

	public function tb_logins()
	{
		return $this->hasMany(TbLogin::class, 'cd_responsavel');
	}

	public function tb_mensagems()
	{
		return $this->hasMany(TbMensagem::class, 'cd_responsavel');
	}

	public function tb_responsavel_aluno()
	{
		return $this->hasOne(TbResponsavelAluno::class, 'cd_responsavel');
	}
}
