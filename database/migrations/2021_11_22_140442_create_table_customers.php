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
            $table->string('customer_name');
            $table->string('customer_phone')->nullable();
            $table->dateTime('customer_dob')->nullable();
            $table->string('customer_email')->unique();
            $table->string('customer_password');
            $table->string('customer_address')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_avatar')->nullable();
            $table->integer('customer_type')->default(0);
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
