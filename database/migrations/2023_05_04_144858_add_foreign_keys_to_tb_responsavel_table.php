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
        Schema::table('tb_responsavel', function (Blueprint $table) {
            $table->foreign(['cd_cadastro'], 'fk_responsavel_cadastro')->references(['cd_cadastro'])->on('tb_cadastro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['cd_endereco'], 'fk_responsavel_endereco')->references(['cd_endereco'])->on('tb_endereco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_responsavel', function (Blueprint $table) {
            $table->dropForeign('fk_responsavel_cadastro');
            $table->dropForeign('fk_responsavel_endereco');
        });
    }
};
