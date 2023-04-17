<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
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
