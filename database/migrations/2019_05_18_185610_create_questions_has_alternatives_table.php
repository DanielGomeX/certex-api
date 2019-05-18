<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsHasAlternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_has_alternatives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('questions_id');
            $table->unsignedInteger('alternatives_id');
            $table->foreign('questions_id')->references('id')->on('questions');
            $table->foreign('alternatives_id')->references('id')->on('alternatives');
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
        Schema::dropIfExists('questions_has_alternatives');
    }
}
