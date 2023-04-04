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
        Schema::create('tb_mensagem', function (Blueprint $table) {
            $table->integer('cd_mensagem')->primary();
            $table->string('ds_mensagem', 200)->nullable();
            $table->date('dt_mensagem')->nullable();
            $table->dateTime('hr_mensagem')->nullable();
            $table->integer('cd_instituicao')->nullable()->index('fk_mensagem_instituicao');
            $table->integer('cd_responsavel')->nullable()->index('fk_mensagem_responsavel');
            $table->integer('cd_profissional')->nullable()->index('fk_mensagem_profissional');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_mensagem');
    }
};
