<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TbMensagem extends Model
{
	protected $table = 'tb_mensagem';
	protected $primaryKey = 'cd_mensagem';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_mensagem' => 'int',
		'dt_mensagem' => 'date',
		'hr_mensagem' => 'date',
		'cd_instituicao' => 'int',
		'cd_responsavel' => 'int',
		'cd_profissional' => 'int'
	];

	protected $fillable = [
		'ds_mensagem',
		'dt_mensagem',
		'hr_mensagem',
		'cd_instituicao',
		'cd_responsavel',
		'cd_profissional'
	];

	public function tb_instituicao()
	{
		return $this->belongsTo(TbInstituicao::class, 'cd_instituicao');
	}

	public function tb_profissional()
	{
		return $this->belongsTo(TbProfissional::class, 'cd_profissional');
	}

	public function tb_responsavel()
	{
		return $this->belongsTo(TbResponsavel::class, 'cd_responsavel');
	}
}
