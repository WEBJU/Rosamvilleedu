<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');//student_id
            $table->integer('class_id');//class_id foreign key reference to classes.id
            $table->string('student_surname');
            $table->string('student_firstname');
            $table->string('student_other_name');
            $table->date('student_date_of_birth')->nullable();
            $table->string('student_religion');
            $table->string('student_medical_info');
            $table->string('primary_school_attended');
            $table->string('student_number_of_siblings');
            $table->string('emergency_name');
            $table->string('emergency_relationship');
            $table->string('emergency_contact');
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
        Schema::dropIfExists('students');
    }
}
