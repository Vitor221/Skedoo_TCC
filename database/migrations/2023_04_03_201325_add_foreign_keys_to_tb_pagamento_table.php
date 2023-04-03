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
        Schema::table('tb_pagamento', function (Blueprint $table) {
            $table->foreign(['cd_forma_pagamento'], 'fk_forma_pagamento_pagamento')->references(['cd_forma_pagamento'])->on('tb_forma_pagamento');
            $table->foreign(['cd_status_pagamento'], 'fk_status_pagamento_pagamento')->references(['cd_status_pagamento'])->on('tb_status_pagamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_pagamento', function (Blueprint $table) {
            $table->dropForeign('fk_forma_pagamento_pagamento');
            $table->dropForeign('fk_status_pagamento_pagamento');
        });
    }
};
