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
        Schema::create('tb_responsavel', function (Blueprint $table) {
            $table->integer('cd_responsavel', true);
            $table->string('nm_responsavel', 80)->nullable();
            $table->char('cd_cpf', 11)->nullable();
            $table->integer('cd_endereco')->nullable()->index('fk_responsavel_endereco');
            $table->integer('cd_cadastro')->nullable()->index('fk_responsavel_cadastro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_responsavel');
    }
};
