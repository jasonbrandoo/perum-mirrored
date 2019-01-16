<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sales_name');
            $table->string('sales_mobile_number');
            $table->string('sales_number');
            $table->string('sales_no_ktp');
            $table->string('sales_address');
            $table->string('sales_city');
            $table->string('sales_province');
            $table->string('sales_zipcode');
            $table->string('sales_position');
            $table->string('active')->nullable();
            $table->string('sales_komisi')->nullable();
            $table->string('sales_void')->nullable();
            $table->string('sales_target');
            $table->string('sales_spv')->nullable();
            $table->dateTime('sales_in');
            $table->dateTime('sales_out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
