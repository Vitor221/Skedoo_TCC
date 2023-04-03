<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbProfissional
 * 
 * @property int $cd_profissional
 * @property string|null $nm_profissional
 * @property string|null $cd_cpf
 * @property string|null $nm_funcao
 * @property int|null $cd_turma
 * @property int|null $cd_cadastro
 * @property int|null $cd_instituicao
 * 
 * @property TbCadastro|null $tb_cadastro
 * @property TbInstituicao|null $tb_instituicao
 * @property TbTurma|null $tb_turma
 * @property Collection|TbMensagem[] $tb_mensagems
 *
 * @package App\Models
 */
class TbProfissional extends Model
{
	protected $table = 'tb_profissional';
	protected $primaryKey = 'cd_profissional';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_profissional' => 'int',
		'cd_turma' => 'int',
		'cd_cadastro' => 'int',
		'cd_instituicao' => 'int'
	];

	protected $fillable = [
		'nm_profissional',
		'cd_cpf',
		'nm_funcao',
		'cd_turma',
		'cd_cadastro',
		'cd_instituicao'
	];

	public function tb_cadastro()
	{
		return $this->belongsTo(TbCadastro::class, 'cd_cadastro');
	}

	public function tb_instituicao()
	{
		return $this->belongsTo(TbInstituicao::class, 'cd_instituicao');
	}

	public function tb_turma()
	{
		return $this->belongsTo(TbTurma::class, 'cd_turma');
	}

	public function tb_mensagems()
	{
		return $this->hasMany(TbMensagem::class, 'cd_profissional');
	}
}
