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
        Schema::table('tb_instituicao', function (Blueprint $table) {
            $table->foreign(['cd_cadastro'], 'fk_instituicao_cadastro')->references(['cd_cadastro'])->on('tb_cadastro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['cd_endereco'], 'fk_instituicao_endereco')->references(['cd_endereco'])->on('tb_endereco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['cd_pagamento'], 'fk_instituicao_pagamento')->references(['cd_pagamento'])->on('tb_pagamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_instituicao', function (Blueprint $table) {
            $table->dropForeign('fk_instituicao_cadastro');
            $table->dropForeign('fk_instituicao_endereco');
            $table->dropForeign('fk_instituicao_pagamento');
        });
    }
};
