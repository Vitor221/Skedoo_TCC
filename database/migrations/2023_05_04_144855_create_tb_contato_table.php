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
        Schema::create('tb_contato', function (Blueprint $table) {
            $table->integer('cd_contato', true);
            $table->string('cd_telefone', 11)->nullable();
            $table->string('ds_contato', 100)->nullable();
            $table->integer('cd_instituicao')->nullable()->index('fk_contato_instituicao');
            $table->integer('cd_responsavel')->nullable()->index('fk_contato_responsavel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_contato');
    }
};
