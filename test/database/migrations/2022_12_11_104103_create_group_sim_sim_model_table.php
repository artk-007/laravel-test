<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_sim_sim_model', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sim_model_id');
            $table->unsignedBigInteger('group_sim_id');
            $table->foreign('sim_model_id')->references('id')->on('sim_models');
            $table->foreign('group_sim_id')->references('id')->on('group_sim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sim_group_sim');
    }
};
