<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('company_type');
            $table->string('company_address');
            $table->string('company_city');
            $table->string('company_province');
            $table->string('company_zipcode');
            $table->string('company_state');
            $table->string('company_phone');
            $table->string('company_ext')->nullable();
            $table->string('company_fax')->nullable();
            $table->string('company_email');
            $table->string('active')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
