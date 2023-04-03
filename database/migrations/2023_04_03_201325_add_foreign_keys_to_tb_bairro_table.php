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
        Schema::table('tb_bairro', function (Blueprint $table) {
            $table->foreign(['cd_cidade'], 'fk_bairro_cidade')->references(['cd_cidade'])->on('tb_cidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_bairro', function (Blueprint $table) {
            $table->dropForeign('fk_bairro_cidade');
        });
    }
};
