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
        Schema::create('tb_login', function (Blueprint $table) {
            $table->integer('cd_login', true);
            $table->string('nm_login', 45)->nullable();
            $table->string('cd_senha', 20)->nullable();
            $table->integer('cd_responsavel')->nullable()->index('fk_login_responsavel');
            $table->integer('cd_acesso')->nullable();
            $table->string('img_perfil',250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_login');
    }
};
