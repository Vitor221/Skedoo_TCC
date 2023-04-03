<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbFormaPagamento
 * 
 * @property int $cd_forma_pagamento
 * @property string|null $nm_forma_pagamento
 * 
 * @property Collection|TbPagamento[] $tb_pagamentos
 *
 * @package App\Models
 */
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

	public function tb_pagamentos()
	{
		return $this->hasMany(TbPagamento::class, 'cd_forma_pagamento');
	}
}
