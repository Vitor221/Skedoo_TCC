<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TbResponsavelAluno extends Model
{
	protected $table = 'tb_responsavel_aluno';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_responsavel' => 'int',
		'cd_aluno' => 'int'
	];

	protected $fillable = [
		'cd_responsavel',
		'cd_aluno'
	];

	public function tb_aluno()
	{
		return $this->belongsTo(TbAluno::class, 'cd_aluno');
	}

	public function tb_responsavel()
	{
		return $this->belongsTo(TbResponsavel::class, 'cd_responsavel');
	}
}
