<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TbTurma extends Model
{
	protected $table = 'tb_turma';
	protected $primaryKey = 'cd_turma';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'cd_turma' => 'int'
	];

	protected $fillable = [
		'nm_turma',
		'ds_periodo'
	];

	public function tb_aluno()
	{
		return $this->hasMany(TbAluno::class, 'cd_turma');
	}

	public function tb_profissional()
	{
		return $this->hasMany(TbProfissional::class, 'cd_turma');
	}
}
