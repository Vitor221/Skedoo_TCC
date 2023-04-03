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
        Schema::table('tb_mensagem', function (Blueprint $table) {
            $table->foreign(['cd_instituicao'], 'fk_mensagem_instituicao')->references(['cd_instituicao'])->on('tb_instituicao');
            $table->foreign(['cd_responsavel'], 'fk_mensagem_responsavel')->references(['cd_responsavel'])->on('tb_responsavel');
            $table->foreign(['cd_profissional'], 'fk_mensagem_profissional')->references(['cd_profissional'])->on('tb_profissional');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_mensagem', function (Blueprint $table) {
            $table->dropForeign('fk_mensagem_instituicao');
            $table->dropForeign('fk_mensagem_responsavel');
            $table->dropForeign('fk_mensagem_profissional');
        });
    }
};
