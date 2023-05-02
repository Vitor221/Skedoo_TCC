<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbResponsavel extends Model
{
    use HasFactory;
    protected $table = 'tb_responsavel';
	protected $primaryKey = 'cd_responsavel';
	public $incrementing = true;
	public $timestamps = false;

	protected $fillable = [
		'nm_responsavel',
		'cd_cpf',
		'cd_endereco',
		'cd_cadastro'
	];

	public function tb_cadastro()
	{
		return $this->belongsTo(TbCadastro::class, 'cd_cadastro');
	}

	public function tb_endereco()
	{
		return $this->belongsTo(TbEndereco::class, 'cd_endereco');
	}

	public function tb_aluno()
	{
		return $this->hasMany(TbAluno::class, 'cd_responsavel');
	}

	public function tb_contato()
	{
		return $this->hasMany(TbContato::class, 'cd_responsavel');
	}

	public function tb_login()
	{
		return $this->hasMany(TbLogin::class, 'cd_responsavel');
	}

	public function tb_mensagem()
	{
		return $this->hasMany(TbMensagem::class, 'cd_responsavel');
	}

	public function tb_responsavel_aluno()
	{
		return $this->hasOne(TbResponsavelAluno::class, 'cd_responsavel');
	}
}
