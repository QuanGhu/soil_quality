<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCausesOfSoilPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('causes_of_soil_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('soil_properties_id');
            $table->timestamps();

            $table->foreign('soil_properties_id')->references('id')->on('soil_properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('causes_of_soil_properties');
    }
}
