<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreign('user_id')->on('student')->references('user_id');
            $table->longText('message_refus')->nullable();
            $table->char('state', 1)->default('E');
            $table->timestamps();
        });
        /**
         * E = EN_COURS
         * V = VALIDÉ
         * R = REFUSÉ
         */

        DB::statement('ALTER TABLE inscriptions ADD CONSTRAINT chk_state_insc CHECK (state IN (\'E\', \'V\', \'R\'));');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}
