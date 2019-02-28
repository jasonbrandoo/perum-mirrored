<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataTypeFromPembatalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembatalans', function (Blueprint $table) {
            //
            $table->decimal('cancel_refund', 12,2)->change();
            $table->decimal('cancel_consumen_bill', 12,2)->change();
            $table->decimal('cancel_total_bill', 12,2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembatalans', function (Blueprint $table) {
            //
        });
    }
}
