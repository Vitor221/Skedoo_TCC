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
        Schema::create('tb_profissional', function (Blueprint $table) {
            $table->integer('cd_profissional')->primary();
            $table->string('nm_profissional', 80)->nullable();
            $table->char('cd_cpf', 11)->nullable();
            $table->string('nm_funcao', 45)->nullable();
            $table->integer('cd_turma')->nullable()->index('fk_profissional_turma');
            $table->integer('cd_cadastro')->nullable()->index('fk_profissional_cadastro');
            $table->integer('cd_instituicao')->nullable()->index('fk_profissional_instituicao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_profissional');
    }
};
