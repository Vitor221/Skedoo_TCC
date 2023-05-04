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
        Schema::table('tb_aluno', function (Blueprint $table) {
            $table->foreign(['cd_instituicao'], 'fk_aluno_instituicao')->references(['cd_instituicao'])->on('tb_instituicao')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['cd_responsavel'], 'fk_aluno_responasvel')->references(['cd_responsavel'])->on('tb_responsavel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['cd_turma'], 'fk_aluno_turma')->references(['cd_turma'])->on('tb_turma')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_aluno', function (Blueprint $table) {
            $table->dropForeign('fk_aluno_instituicao');
            $table->dropForeign('fk_aluno_responasvel');
            $table->dropForeign('fk_aluno_turma');
        });
    }
};
