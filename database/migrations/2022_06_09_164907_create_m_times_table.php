<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_times', function (Blueprint $table) {
            $table->date('date');
            $table->integer('time');
            $table->integer('test');
            $table->integer('negative');
            $table->integer('confirmed');
            $table->integer('released');
            $table->integer('deceased');
            $table->primary('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_times');
    }
}
