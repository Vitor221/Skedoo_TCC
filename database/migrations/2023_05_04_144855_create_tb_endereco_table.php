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
        Schema::create('tb_endereco', function (Blueprint $table) {
            $table->integer('cd_endereco', true);
            $table->string('nm_endereco', 100)->nullable();
            $table->integer('cd_cep')->nullable();
            $table->integer('cd_bairro')->nullable()->index('fk_endereco_bairro');
            $table->integer('cd_numcasa')->nullable();
            $table->string('ds_complemento', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_endereco');
    }
};
