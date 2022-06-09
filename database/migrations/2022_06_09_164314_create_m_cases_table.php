<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_cases', function (Blueprint $table) {
            $table->string('case_id');
            $table->string('province');
            $table->string('city');
            $table->string('group');
            $table->text('infection_case');
            $table->integer('confirmed');
            $table->float('latitude', 11, 8);
            $table->float('longitude', 11, 8);
            $table->primary('case_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_cases');
    }
}
