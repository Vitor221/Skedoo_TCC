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
        Schema::create('tb_pagamento', function (Blueprint $table) {
            $table->integer('cd_pagamento')->primary();
            $table->integer('cd_responsavel')->nullable();
            $table->decimal('vl_fatura', 9)->nullable();
            $table->date('dt_pagamento')->nullable();
            $table->integer('cd_forma_pagamento')->nullable()->index('fk_forma_pagamento_pagamento');
            $table->integer('cd_status_pagamento')->nullable()->index('fk_status_pagamento_pagamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pagamento');
    }
};
