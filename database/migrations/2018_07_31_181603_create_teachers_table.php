<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');//foreign key to user_id
            $table->string('teacher_tsc_no')->nullable();//unique
            /*
            $table->string('teacher.national_id');//remove exists in users table
            $table->string('teacher_name');//remove exists in users table
            $table->string('teacher_phone');//remove exists in users table
            $table->string('teacher_extra_info');//remove exists in users table
            */
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
        Schema::dropIfExists('teachers');
    }
}
