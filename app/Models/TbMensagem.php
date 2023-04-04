<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbMensagem
 * 
 * @property int $cd_mensagem
 * @property string|null $ds_mensagem
 * @property Carbon|null $dt_mensagem
 * @property Carbon|null $hr_mensagem
 * @property int|null $cd_instituicao
 * @property int|null $cd_responsavel
 * @property int|null $cd_profissional
 * 
 * @property TbInstituicao|null $tb_instituicao
 * @property TbProfissional|null $tb_profissional
 * @property TbResponsavel|null $tb_responsavel
 *
 * @package App\Models
 */
class TbMensagem extends Model
{
	protected $table = 'tb_mensagem';
	protected $primaryKey = 'cd_mensagem';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_mensagem' => 'int',
		'dt_mensagem' => 'date',
		'hr_mensagem' => 'date',
		'cd_instituicao' => 'int',
		'cd_responsavel' => 'int',
		'cd_profissional' => 'int'
	];

	protected $fillable = [
		'ds_mensagem',
		'dt_mensagem',
		'hr_mensagem',
		'cd_instituicao',
		'cd_responsavel',
		'cd_profissional'
	];

	public function tb_instituicao()
	{
		return $this->belongsTo(TbInstituicao::class, 'cd_instituicao');
	}

	public function tb_profissional()
	{
		return $this->belongsTo(TbProfissional::class, 'cd_profissional');
	}

	public function tb_responsavel()
	{
		return $this->belongsTo(TbResponsavel::class, 'cd_responsavel');
	}
}
