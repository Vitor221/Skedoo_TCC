<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbTurma
 * 
 * @property int $cd_turma
 * @property string|null $nm_turma
 * @property string|null $ds_periodo
 * 
 * @property Collection|TbAluno[] $tb_alunos
 * @property Collection|TbProfissional[] $tb_profissionals
 *
 * @package App\Models
 */
class TbTurma extends Model
{
	protected $table = 'tb_turma';
	protected $primaryKey = 'cd_turma';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_turma' => 'int'
	];

	protected $fillable = [
		'nm_turma',
		'ds_periodo'
	];

	public function tb_alunos()
	{
		return $this->hasMany(TbAluno::class, 'cd_turma');
	}

	public function tb_profissionals()
	{
		return $this->hasMany(TbProfissional::class, 'cd_turma');
	}
}
