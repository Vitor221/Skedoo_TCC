<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbAluno
 * 
 * @property int $cd_aluno
 * @property string|null $nm_aluno
 * @property Carbon|null $dt_nascimento
 * @property string|null $cd_certidao
 * @property string|null $im_vacinacao
 * @property string|null $im_aluno
 * @property string|null $cd_contato
 * @property int|null $cd_turma
 * @property int|null $cd_instituicao
 * @property int|null $cd_responsavel
 * 
 * @property TbInstituicao|null $tb_instituicao
 * @property TbResponsavel|null $tb_responsavel
 * @property TbTurma|null $tb_turma
 * @property TbResponsavelAluno $tb_responsavel_aluno
 *
 * @package App\Models
 */
class TbAluno extends Model
{
	protected $table = 'tb_aluno';
	protected $primaryKey = 'cd_aluno';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_aluno' => 'int',
		'dt_nascimento' => 'date',
		'cd_turma' => 'int',
		'cd_instituicao' => 'int',
		'cd_responsavel' => 'int'
	];

	protected $fillable = [
		'nm_aluno',
		'dt_nascimento',
		'cd_certidao',
		'im_vacinacao',
		'im_aluno',
		'cd_contato',
		'cd_turma',
		'cd_instituicao',
		'cd_responsavel'
	];

	public function tb_instituicao()
	{
		return $this->belongsTo(TbInstituicao::class, 'cd_instituicao');
	}

	public function tb_responsavel()
	{
		return $this->belongsTo(TbResponsavel::class, 'cd_responsavel');
	}

	public function tb_turma()
	{
		return $this->belongsTo(TbTurma::class, 'cd_turma');
	}

	public function tb_responsavel_aluno()
	{
		return $this->hasOne(TbResponsavelAluno::class, 'cd_aluno');
	}
}
