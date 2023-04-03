<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbUf
 * 
 * @property string $sg_uf
 * @property string|null $nm_uf
 * 
 * @property Collection|TbCidade[] $tb_cidades
 *
 * @package App\Models
 */
class TbUf extends Model
{
	protected $table = 'tb_uf';
	protected $primaryKey = 'sg_uf';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nm_uf'
	];

	public function tb_cidades()
	{
		return $this->hasMany(TbCidade::class, 'sg_uf');
	}
}
