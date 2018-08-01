<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');//exam_id
            $table->integer('student_id');//foreign key to student.id
            $table->integer('class_id');//foreign key to class.id
            $table->integer('maths');
            $table->integer('english');
            $table->integer('kiswahili');
            $table->integer('science');
            $table->integer('religion');
            $table->integer('social_studies');
            $table->integer('total_marks');
            $table->integer('rank');
            $table->date('exam_year');//year of exam
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
        Schema::dropIfExists('results');
    }
}
