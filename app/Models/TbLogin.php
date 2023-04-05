<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TbLogin
 * 
 * @property int $cd_login
 * @property string|null $nm_login
 * @property string|null $cd_senha
 * @property int|null $cd_responsavel
 * 
 * @property TbResponsavel|null $tb_responsavel
 *
 * @package App\Models
 */
class TbLogin extends Model
{
	protected $table = 'tb_login';
	protected $primaryKey = 'cd_login';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_login' => 'int',
		'cd_responsavel' => 'int',
		'cd_acesso'	=> 'int'
	];

	protected $fillable = [
		'nm_login',
		'cd_senha',
		'cd_responsavel',
		'cd_acesso',
	];

	public function tb_responsavel()
	{
		return $this->belongsTo(TbResponsavel::class, 'cd_responsavel');
	}
}
