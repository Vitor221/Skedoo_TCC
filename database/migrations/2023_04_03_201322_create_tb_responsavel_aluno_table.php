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
        Schema::create('tb_responsavel_aluno', function (Blueprint $table) {
            $table->integer('cd_responsavel')->nullable()->index('fk_responsavel_aluno_responsavel');
            $table->integer('cd_aluno')->nullable()->index('fk_responsavel_aluno_aluno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_responsavel_aluno');
    }
};
