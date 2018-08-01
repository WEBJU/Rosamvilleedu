<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachingLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaching_lessons', function (Blueprint $table) {
            $table->increments('id');//lessons_id
            $table->integer('teacher_id');//foreign key to user.id specifically category
            $table->integer('student_id');//foreign key to student.id
            $table->integer('class_id');//foreign key to class.id
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
        Schema::dropIfExists('teaching_lessons');
    }
}
