<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbCidade
 * 
 * @property int $cd_cidade
 * @property string|null $nm_cidade
 * @property string|null $sg_uf
 * 
 * @property TbUf|null $tb_uf
 * @property Collection|TbBairro[] $tb_bairros
 *
 * @package App\Models
 */
class TbCidade extends Model
{
	protected $table = 'tb_cidade';
	protected $primaryKey = 'cd_cidade';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_cidade' => 'int'
	];

	protected $fillable = [
		'nm_cidade',
		'sg_uf'
	];

	public function tb_uf()
	{
		return $this->belongsTo(TbUf::class, 'sg_uf');
	}

	public function tb_bairros()
	{
		return $this->hasMany(TbBairro::class, 'cd_cidade');
	}
}
