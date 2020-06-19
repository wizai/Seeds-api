<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title', 255);
            $table->string('category', 255);
            $table->binary('image');
            $table->dateTime('sowed', 0)->nullable();
            $table->dateTime('planted', 0)->nullable();
            $table->string('seedling_frequency', 255);
            $table->string('seedling_light', 255);
            $table->string('planting_frequency', 255);
            $table->string('planting_sprouting', 255);
            $table->text('description');
            $table->text('localisation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
