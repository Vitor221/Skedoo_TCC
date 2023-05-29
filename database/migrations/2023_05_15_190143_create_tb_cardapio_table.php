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
        Schema::create('tb_cardapio', function (Blueprint $table) {
             $table->integer('id_cardapio', true);
            $table->date('dt_cardapio');
            $table->string('nm_ddsemana', 20);
            $table->string('nm_prato', 70);
            $table->string('desc_prato', 150);
            $table->string('cd_cor',10);
            $table->string('img_prato', 100);
            $table->string('nm_sobremessa', 30);
            $table->string('desc_sobremessa', 100);
            $table->string('img_sobremssa', 70);
            $table->string('img_pdf', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_cardapio');
    }
};
