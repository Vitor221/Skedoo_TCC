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
        Schema::table('tb_profissional', function (Blueprint $table) {
            $table->foreign(['cd_cadastro'], 'fk_profissional_cadastro')->references(['cd_cadastro'])->on('tb_cadastro');
            $table->foreign(['cd_turma'], 'fk_profissional_turma')->references(['cd_turma'])->on('tb_turma');
            $table->foreign(['cd_instituicao'], 'fk_profissional_instituicao')->references(['cd_instituicao'])->on('tb_instituicao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_profissional', function (Blueprint $table) {
            $table->dropForeign('fk_profissional_cadastro');
            $table->dropForeign('fk_profissional_turma');
            $table->dropForeign('fk_profissional_instituicao');
        });
    }
};
