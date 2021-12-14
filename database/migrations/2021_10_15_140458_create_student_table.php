<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateStudentTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
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

            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->on('users')->references('id');

            $table->timestamps();
        });

        // // DB::statement("create sequence matricule_seq");
        // DB::statement("alter table student alter matricule set default nextval('matricule_seq')");
        // // DB::statement("Select setval('matricule_seq', 2000051)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('student');
    }
}
