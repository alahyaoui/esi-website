<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            // $table->integer('matricule')->primary();
            $table->id();
            $table->integer('matricule')->unique()->nullable();
            $table->string('first_name');
            $table->string('last_name');

            $table->integer('bloc');
            $table->foreign('bloc')->on('bloc')->references('bloc');

            $table->char('section');
            $table->foreign('section')->on('section')->references('section');

            $table->integer('user_id')->unique();
            $table->foreign('user_id')->on('users')->references('id');

            $table->boolean('is_validated')->default(false);

            $table->boolean('is_inprogress')->default(true);

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
        Schema::dropIfExists('student');
    }
}
