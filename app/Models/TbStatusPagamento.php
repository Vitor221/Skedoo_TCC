<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbStatusPagamento
 * 
 * @property int $cd_status_pagamento
 * @property string|null $nm_status_pagamento
 * 
 * @property Collection|TbPagamento[] $tb_pagamentos
 *
 * @package App\Models
 */
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

	public function tb_pagamentos()
	{
		return $this->hasMany(TbPagamento::class, 'cd_status_pagamento');
	}
}
