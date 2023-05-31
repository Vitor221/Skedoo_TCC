<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class TbAluno extends Model
{
	use HasFactory;
	protected $table = 'tb_aluno';
	protected $primaryKey = 'cd_aluno';
	public $incrementing = true;
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

	public static function search ($search) {

		return self::where('nm_aluno', "like","%{$search}%")
		->orWhere('cd_turma', "like","%{$search}%")
		->paginate(6);

		}
}
