<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
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

	public function tb_instituicao()
	{
		return $this->hasMany(TbInstituicao::class, 'cd_pagamento');
	}
}
