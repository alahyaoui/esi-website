<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_section', function (Blueprint $table) {
            $table->string('course');
            $table->foreign('course')->on('course')->references('title');
            $table->char('section');
            $table->foreign('section')->on('section')->references('section');

            $table->primary(array('course', 'section'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_section');
    }
}