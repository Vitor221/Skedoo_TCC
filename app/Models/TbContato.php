<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TbContato
 * 
 * @property int $cd_contato
 * @property string|null $cd_telefone
 * @property string|null $ds_contato
 * @property int|null $cd_instituicao
 * @property int|null $cd_responsavel
 * 
 * @property TbInstituicao|null $tb_instituicao
 * @property TbResponsavel|null $tb_responsavel
 *
 * @package App\Models
 */
class TbContato extends Model
{
	protected $table = 'tb_contato';
	protected $primaryKey = 'cd_contato';
	public $incrementing = false;
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
