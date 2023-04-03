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
        Schema::table('tb_cidade', function (Blueprint $table) {
            $table->foreign(['sg_uf'], 'fk_cidade_uf')->references(['sg_uf'])->on('tb_uf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_cidade', function (Blueprint $table) {
            $table->dropForeign('fk_cidade_uf');
        });
    }
};
