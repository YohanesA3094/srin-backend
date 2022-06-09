<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMPatientInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_patient_infos', function (Blueprint $table) {
            $table->string('patient_id');
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->text('infection_case')->nullable();
            $table->string('infected_by')->nullable();
            $table->string('contact_number')->nullable();
            $table->date('symptom_onset_date')->nullable();
            $table->date('confirmed_date');
            $table->date('released_date')->nullable();
            $table->date('deceased_date')->nullable();
            $table->string('state');
            $table->primary('patient_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_patient_infos');
    }
}
