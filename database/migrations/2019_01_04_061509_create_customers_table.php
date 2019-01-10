<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_reference_id');
            $table->string('customer_executive_id');
            $table->string('customer_supervisor_id');
            $table->string('customer_office_id');
            $table->string('customer_name');
            $table->string('customer_ktp');
            $table->string('customer_ktp_expired');
            $table->string('customer_ktp_address');
            $table->string('customer_city');
            $table->string('customer_zipcode');
            $table->string('customer_current_address');
            $table->string('customer_current_city');
            $table->string('customer_current_zipcode');
            $table->string('customer_telp');
            $table->string('customer_mobile_number');
            $table->string('customer_house_status');
            $table->string('customer_length_of_stay');
            $table->string('customer_birth_place');
            $table->dateTime('customer_birthdate');
            $table->string('customer_maternal_status');
            $table->string('customer_tanggungan');
            $table->string('customer_npwp');
            $table->string('customer_religion');
            $table->string('customer_gender');
            $table->string('customer_mother');
            $table->string('customer_address_mail');
            
            /* ------- */
            $table->string('customer_job_name');
            $table->string('customer_nip');
            $table->string('customer_job_title');
            $table->string('customer_job_duration');
            $table->string('customer_office_email');
            /* ------- */
            $table->integer('customer_income');
            $table->integer('customer_additional_income');
            $table->integer('customer_family_income');
            $table->integer('customer_total_income');
            $table->integer('customer_routine_expenses');
            $table->integer('customer_residual_income');
            $table->integer('customer_installment_ability');

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
        Schema::dropIfExists('customers');
    }
}
