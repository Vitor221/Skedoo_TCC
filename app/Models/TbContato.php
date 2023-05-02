<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TbContato extends Model
{
	protected $table = 'tb_contato';
	protected $primaryKey = 'cd_contato';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'cd_contato' => 'int',
		'cd_instituicao' => 'int',
		'cd_responsavel' => 'int'
	];

	protected $fillable = [
		'cd_telefone',
		'ds_contato',
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
}
