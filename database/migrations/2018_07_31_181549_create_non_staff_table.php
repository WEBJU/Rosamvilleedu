<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('national_id');
            $table->string('name');
            $table->string('phone_no');
            $table->string('residence');
            $table->integer('department_id');//foreign key to department.id
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
        Schema::dropIfExists('non_staff');
    }
}
