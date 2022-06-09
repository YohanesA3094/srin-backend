<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_policies', function (Blueprint $table) {
            $table->string('policy_id');
            $table->string('country');
            $table->string('type');
            $table->text('gov_policy');
            $table->text('detail')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->primary('policy_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_policies');
    }
}
