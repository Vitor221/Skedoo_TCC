<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbPagamento
 * 
 * @property int $cd_pagamento
 * @property int|null $cd_responsavel
 * @property float|null $vl_fatura
 * @property Carbon|null $dt_pagamento
 * @property int|null $cd_forma_pagamento
 * @property int|null $cd_status_pagamento
 * 
 * @property TbFormaPagamento|null $tb_forma_pagamento
 * @property TbStatusPagamento|null $tb_status_pagamento
 * @property Collection|TbInstituicao[] $tb_instituicaos
 *
 * @package App\Models
 */
class TbPagamento extends Model
{
	protected $table = 'tb_pagamento';
	protected $primaryKey = 'cd_pagamento';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_pagamento' => 'int',
		'cd_responsavel' => 'int',
		'vl_fatura' => 'float',
		'dt_pagamento' => 'date',
		'cd_forma_pagamento' => 'int',
		'cd_status_pagamento' => 'int'
	];

	protected $fillable = [
		'cd_responsavel',
		'vl_fatura',
		'dt_pagamento',
		'cd_forma_pagamento',
		'cd_status_pagamento'
	];

	public function tb_forma_pagamento()
	{
		return $this->belongsTo(TbFormaPagamento::class, 'cd_forma_pagamento');
	}

	public function tb_status_pagamento()
	{
		return $this->belongsTo(TbStatusPagamento::class, 'cd_status_pagamento');
	}

	public function tb_instituicaos()
	{
		return $this->hasMany(TbInstituicao::class, 'cd_pagamento');
	}
}
