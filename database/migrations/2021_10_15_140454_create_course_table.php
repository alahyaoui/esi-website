<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->string('title')->primary();
            $table->string('description');
            $table->integer('quadri');
            $table->integer('credits');
            $table->integer('bloc');
            $table->foreign('bloc')->on('bloc')->references('bloc')->onDelete('cascade');
        });
        DB::statement('ALTER TABLE course ADD CONSTRAINT chk_quadri_number CHECK (quadri IN (1,2,3,4,5,6));');
        DB::statement('ALTER TABLE course ADD CONSTRAINT chk_credits_number CHECK (credits > 0);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}