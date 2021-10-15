<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBlocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloc', function (Blueprint $table) {
            $table->integer('bloc')->primary();
        });
        DB::statement('ALTER TABLE bloc ADD CONSTRAINT chk_bloc_number CHECK (bloc IN (1, 2, 3));');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bloc');
    }
}
