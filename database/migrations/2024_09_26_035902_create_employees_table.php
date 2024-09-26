<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->primary('id');
            $table->string('employee_id');
            $table->string('name');
            $table->string('lastname');
            $table->string('address');
            $table->string('phone_number');
            $table->string('birthplace');
            $table->uuid('area_id')->nullable();
            $table->uuid('charge_id')->nullable();
            $table->uuid('role_id')->nullable();
            $table->uuid('boss_id')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
