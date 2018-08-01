<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_staffs', function (Blueprint $table) {
            $table->increments('id');//non-staff_id
            $table->integer('department_id');//foreign key to department.id
            $table->string('national_id');
            $table->string('name');
            $table->string('phone_no');
            $table->string('residence');
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
        Schema::dropIfExists('non_staffs');
    }
}
