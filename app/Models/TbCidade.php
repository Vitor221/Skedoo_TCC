<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TbCidade extends Model
{
	protected $table = 'tb_cidade';
	protected $primaryKey = 'cd_cidade';
	public $incrementing = true;
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

	public function tb_bairro()
	{
		return $this->hasMany(TbBairro::class, 'cd_cidade');
	}
}
