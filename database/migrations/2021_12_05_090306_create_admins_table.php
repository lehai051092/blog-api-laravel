<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('admin_id');
            $table->string('admin_first_name');
            $table->string('admin_last_name');
            $table->string('admin_email')->unique();
            $table->string('admin_password');
            $table->string('admin_phone')->nullable();
            $table->string('admin_image')->nullable();
            $table->integer('admin_status')->default(1);
            $table->unsignedBigInteger('admin_role_id')->nullable();
            $table->foreign('admin_role_id')->references('role_id')->on('roles')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('admins');
    }
}
