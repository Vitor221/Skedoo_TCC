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
        Schema::table('tb_endereco', function (Blueprint $table) {
            $table->foreign(['cd_bairro'], 'fk_endereco_bairro')->references(['cd_bairro'])->on('tb_bairro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_endereco', function (Blueprint $table) {
            $table->dropForeign('fk_endereco_bairro');
        });
    }
};
