<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbEndereco
 * 
 * @property int $cd_endereco
 * @property string|null $nm_endereco
 * @property int|null $cd_cep
 * @property int|null $cd_bairro
 * @property int|null $cd_numcasa
 * 
 * @property TbBairro|null $tb_bairro
 * @property Collection|TbInstituicao[] $tb_instituicaos
 * @property Collection|TbResponsavel[] $tb_responsavels
 *
 * @package App\Models
 */
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
