<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('id');//fees_id
            $table->integer('student_id');//foreign key to student.id
            $table->integer('class_id');//foreign key to class.id
            $table->date('date_paid');//date fees was paid
            $table->integer('amount_to_be_paid');
            $table->integer('amount_paid');
            $table->integer('balance');//amount_to_be_paid - amount_paid
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
        Schema::dropIfExists('fees');
    }
}
