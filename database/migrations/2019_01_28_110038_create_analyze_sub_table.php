<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalyzeSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyze_sub', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('analyze_id');
            $table->string('soil_criteria');
            $table->timestamps();

            $table->foreign('analyze_id')->references('id')->on('analyze')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analyze_sub');
    }
}
