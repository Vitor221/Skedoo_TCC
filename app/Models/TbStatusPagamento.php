<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TbStatusPagamento extends Model
{
	protected $table = 'tb_status_pagamento';
	protected $primaryKey = 'cd_status_pagamento';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_status_pagamento' => 'int'
	];

	protected $fillable = [
		'nm_status_pagamento'
	];

	public function tb_pagamento()
	{
		return $this->hasMany(TbPagamento::class, 'cd_status_pagamento');
	}
}
