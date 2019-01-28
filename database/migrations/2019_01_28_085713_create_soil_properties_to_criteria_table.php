<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoilPropertiesToCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soil_properties_to_criteria', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('soil_properties_id');
            $table->unsignedInteger('soil_criteria_id');
            $table->timestamps();

            $table->foreign('soil_properties_id')->references('id')->on('soil_properties')->onDelete('cascade');
            $table->foreign('soil_criteria_id')->references('id')->on('soil_criteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soil_properties_to_criteria');
    }
}
