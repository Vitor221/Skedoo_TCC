<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TbFormaPagamento extends Model
{
	protected $table = 'tb_forma_pagamento';
	protected $primaryKey = 'cd_forma_pagamento';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_forma_pagamento' => 'int'
	];

	protected $fillable = [
		'nm_forma_pagamento'
	];

	public function tb_pagamento()
	{
		return $this->hasMany(TbPagamento::class, 'cd_forma_pagamento');
	}
}
