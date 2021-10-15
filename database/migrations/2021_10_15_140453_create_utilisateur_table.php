<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_secretary')->default(false);
            $table->boolean('is_student')->default(true);

            // foreign key
            $table->integer('matricule')->nullable();
            $table->foreign('matricule')->on('student')->references('matricule');
        });

        DB::statement(
            'ALTER TABLE utilisateur
                    ADD CONSTRAINT chk_user_role
                        CHECK ((is_admin = true AND is_secretary = false AND is_student = false)
                                   OR (is_admin = false AND is_secretary = true AND is_student = false)
                                   OR (is_admin = false AND is_secretary = false AND is_student = true));'
        );

        // TODO: matricule update check is student
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
