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
        Schema::create('tb_aluno', function (Blueprint $table) {
            $table->integer('cd_aluno', true);
            $table->string('nm_aluno', 80)->nullable();
            $table->date('dt_nascimento')->nullable();
            $table->string('cd_certidao', 32)->nullable();
            $table->binary('im_vacinacao')->nullable();
            $table->binary('im_aluno')->nullable();
            $table->char('cd_contato', 14)->nullable();
            $table->integer('se_problema_saude')->nullable();
            $table->string('nm_problema_saude', 20)->nullable();
            $table->string('ds_problema_saude', 150)->nullable();
            $table->string('nm_tipo_ps', 20)->nullable();
            $table->integer('cd_turma')->nullable()->index('fk_aluno_turma');
            $table->integer('cd_instituicao')->nullable()->index('fk_aluno_instituicao');
            $table->integer('cd_responsavel')->nullable()->index('fk_aluno_responasvel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_aluno');
    }
};
