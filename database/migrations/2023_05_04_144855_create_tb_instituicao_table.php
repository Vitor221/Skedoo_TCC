<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_instituicao', function (Blueprint $table) {
            $table->integer('cd_instituicao', true);
            $table->string('nm_instituicao', 80)->nullable();
            $table->char('cd_cnpj', 14)->nullable();
            $table->char('cd_cep', 8)->nullable();
            $table->integer('cd_profissional')->nullable();
            $table->string('nm_email', 100)->nullable();
            $table->integer('cd_contato')->nullable();
            $table->integer('cd_endereco')->nullable()->index('fk_instituicao_endereco');
            $table->integer('cd_cadastro')->nullable()->index('fk_instituicao_cadastro');
            $table->integer('cd_pagamento')->nullable()->index('fk_instituicao_pagamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_instituicao');
    }
};
