<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbBairro
 * 
 * @property int $cd_bairro
 * @property string|null $nm_bairro
 * @property int|null $cd_cidade
 * 
 * @property TbCidade|null $tb_cidade
 * @property Collection|TbEndereco[] $tb_enderecos
 *
 * @package App\Models
 */
class TbBairro extends Model
{
	protected $table = 'tb_bairro';
	protected $primaryKey = 'cd_bairro';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_bairro' => 'int',
		'cd_cidade' => 'int'
	];

	protected $fillable = [
		'nm_bairro',
		'cd_cidade'
	];

	public function tb_cidade()
	{
		return $this->belongsTo(TbCidade::class, 'cd_cidade');
	}

	public function tb_enderecos()
	{
		return $this->hasMany(TbEndereco::class, 'cd_bairro');
	}
}
