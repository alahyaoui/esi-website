<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProgrammeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme', function (Blueprint $table) {
            $table->integer('student');
            $table->foreign('student')->on('student')->references('matricule');

            $table->string('course');
            $table->foreign('course')->on('course')->references('title');

            $table->integer('cote');
            $table->boolean('is_validated')->default(false);
            $table->boolean('is_accessible')-> default(false);
            
            $table->primary(array('student', 'course'));
        });
        DB::statement('ALTER TABLE programme ADD CONSTRAINT chk_cote_number CHECK (cote >= 0);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cote');
    }
}