<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TbUf extends Model
{
	protected $table = 'tb_uf';
	protected $primaryKey = 'sg_uf';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nm_uf'
	];

	public function tb_cidade()
	{
		return $this->hasMany(TbCidade::class, 'sg_uf');
	}
}
