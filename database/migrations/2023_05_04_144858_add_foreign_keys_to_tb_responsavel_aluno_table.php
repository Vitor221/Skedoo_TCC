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
        Schema::table('tb_responsavel_aluno', function (Blueprint $table) {
            $table->foreign(['cd_aluno'], 'fk_responsavel_aluno_aluno')->references(['cd_aluno'])->on('tb_aluno')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['cd_responsavel'], 'fk_responsavel_aluno_responsavel')->references(['cd_responsavel'])->on('tb_responsavel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_responsavel_aluno', function (Blueprint $table) {
            $table->dropForeign('fk_responsavel_aluno_aluno');
            $table->dropForeign('fk_responsavel_aluno_responsavel');
        });
    }
};
