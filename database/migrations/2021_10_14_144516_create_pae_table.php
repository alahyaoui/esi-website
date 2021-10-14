<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pae', function (Blueprint $table) {
            $table->integer('student');
            $table->foreign('student')->on('student')->references('matricule');

            $table->string('course');
            $table->foreign('course')->on('course')->references('title');

            $table->boolean('is_validated')->default(false);

            $table->primary(array('student', 'course'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pae');
    }
}
