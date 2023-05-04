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
        Schema::create('tb_turma', function (Blueprint $table) {
            $table->integer('cd_turma', true);
            $table->string('nm_turma', 50)->nullable();
            $table->string('ds_periodo', 30)->nullable();
            $table->string('sg_turma', 5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_turma');
    }
};
