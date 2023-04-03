<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbInstituicao
 * 
 * @property int $cd_instituicao
 * @property string|null $nm_instituicao
 * @property string|null $cd_cnpj
 * @property string|null $cd_cep
 * @property int|null $cd_profissional
 * @property string|null $nm_email
 * @property int|null $cd_contato
 * @property int|null $cd_endereco
 * @property int|null $cd_cadastro
 * @property int|null $cd_pagamento
 * 
 * @property TbCadastro|null $tb_cadastro
 * @property TbEndereco|null $tb_endereco
 * @property TbPagamento|null $tb_pagamento
 * @property Collection|TbAluno[] $tb_alunos
 * @property Collection|TbContato[] $tb_contatos
 * @property Collection|TbMensagem[] $tb_mensagems
 * @property Collection|TbProfissional[] $tb_profissionals
 *
 * @package App\Models
 */
class TbInstituicao extends Model
{
	protected $table = 'tb_instituicao';
	protected $primaryKey = 'cd_instituicao';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cd_instituicao' => 'int',
		'cd_profissional' => 'int',
		'cd_contato' => 'int',
		'cd_endereco' => 'int',
		'cd_cadastro' => 'int',
		'cd_pagamento' => 'int'
	];

	protected $fillable = [
		'nm_instituicao',
		'cd_cnpj',
		'cd_cep',
		'cd_profissional',
		'nm_email',
		'cd_contato',
		'cd_endereco',
		'cd_cadastro',
		'cd_pagamento'
	];

	public function tb_cadastro()
	{
		return $this->belongsTo(TbCadastro::class, 'cd_cadastro');
	}

	public function tb_endereco()
	{
		return $this->belongsTo(TbEndereco::class, 'cd_endereco');
	}

	public function tb_pagamento()
	{
		return $this->belongsTo(TbPagamento::class, 'cd_pagamento');
	}

	public function tb_alunos()
	{
		return $this->hasMany(TbAluno::class, 'cd_instituicao');
	}

	public function tb_contatos()
	{
		return $this->hasMany(TbContato::class, 'cd_instituicao');
	}

	public function tb_mensagems()
	{
		return $this->hasMany(TbMensagem::class, 'cd_instituicao');
	}

	public function tb_profissionals()
	{
		return $this->hasMany(TbProfissional::class, 'cd_instituicao');
	}
}
