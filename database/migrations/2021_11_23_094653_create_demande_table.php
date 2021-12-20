<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDemandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_matricule');
            $table->foreign('student_matricule')->on('student')->references('matricule');
            $table->longText('message');
            $table->char('state', 1)->default('E');
            $table->timestamps();
        });
        /**
         * E = EN COURS
         * A = ACCEPTÉ
         * R = REFUSÉ
         */
        DB::statement('ALTER TABLE demande ADD CONSTRAINT chk_state CHECK (state IN (\'E\', \'A\', \'R\'));');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande');
    }
}
