<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_first_name');
            $table->string('customer_last_name');
            $table->string('customer_email')->unique();
            $table->string('customer_password');
            $table->dateTime('customer_dob')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_image')->nullable();
            $table->string('customer_address')->nullable();
            $table->unsignedBigInteger('customer_district_id')->nullable();
            $table->unsignedBigInteger('customer_city_id')->nullable();
            $table->unsignedBigInteger('customer_country_id')->nullable();
            $table->unsignedBigInteger('customer_role_id')->nullable();
            $table->foreign('customer_district_id')->references('district_id')->on('districts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('customer_city_id')->references('city_id')->on('cities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('customer_country_id')->references('country_id')->on('countries')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('customer_role_id')->references('role_id')->on('roles')->cascadeOnUpdate()->cascadeOnDelete();
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
