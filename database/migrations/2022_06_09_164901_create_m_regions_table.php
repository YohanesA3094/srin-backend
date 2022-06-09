<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_regions', function (Blueprint $table) {
            $table->string('code');
            $table->string('province');
            $table->string('city');
            $table->float('latitude', 11, 8);
            $table->float('longitude', 11, 8);
            $table->integer('elementary_school_count');
            $table->integer('kindergarten_count');
            $table->integer('university_count');
            $table->float('academy_ratio', 10, 2);
            $table->float('elderly_ratio', 10, 2);
            $table->float('elderly_population_ratio', 10, 2);
            $table->float('elderly_alone_ratio', 10, 2);
            $table->integer('nursing_home_count');
            $table->primary('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_regions');
    }
}
