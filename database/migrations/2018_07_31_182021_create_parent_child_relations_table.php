<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentChildRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_child_relations', function (Blueprint $table) {
            $table->increments('id');//relation_id
            $table->integer('parent_id');//foreign key to parents.id
            $table->integer('student_id');//foreign key to student.id
           // $table->integer('number_of_parents');//one_parent/guardian/two_parents i.e 1 / 2
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
        Schema::dropIfExists('parent_child_relations');
    }
}
