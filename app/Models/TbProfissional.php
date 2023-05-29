<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TbProfissional extends Model
{
	protected $table = 'tb_profissional';
	protected $primaryKey = 'cd_profissional';
	public $incrementing = true;
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

	public function tb_mensagem()
	{
		return $this->hasMany(TbMensagem::class, 'cd_profissional');
	}

	public static function search ($search) {

		return self::where('nm_profissional', "like","%{$search}%")
		->orWhere('cd_profissional', "like","%{$search}%")
		->paginate(6);

		}
}
