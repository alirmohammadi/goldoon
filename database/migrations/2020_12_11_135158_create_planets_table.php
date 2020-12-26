<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("latin_name");
            $table->foreignId("care_situation_id");
            $table->foreignId("water_id");
            $table->foreignId("light_id");
            $table->foreignId("temperature_id");
            $table->foreignId("humidity_id");
            $table->foreignId("cleaning_id");
            $table->foreignId("poison_id");
            $table->foreignId("life_id");
            $table->foreignId("soil_id");
            $table->string("size");
            $table->foreignId("sub_category_id");
            $table->integer("soil_period");
            $table->integer("water_period");
            $table->string("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planets');
    }
}
