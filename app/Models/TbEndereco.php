<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TbEndereco extends Model
{
	protected $table = 'tb_endereco';
	protected $primaryKey = 'cd_endereco';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_endereco' => 'int',
		'cd_cep' => 'int',
		'cd_bairro' => 'int',
		'cd_numcasa' => 'int'
	];

	protected $fillable = [
		'nm_endereco',
		'cd_cep',
		'cd_bairro',
		'cd_numcasa'
	];

	public function tb_bairro()
	{
		return $this->belongsTo(TbBairro::class, 'cd_bairro');
	}

	public function tb_instituicaos()
	{
		return $this->hasMany(TbInstituicao::class, 'cd_endereco');
	}

	public function tb_responsavels()
	{
		return $this->hasMany(TbResponsavel::class, 'cd_endereco');
	}
}
