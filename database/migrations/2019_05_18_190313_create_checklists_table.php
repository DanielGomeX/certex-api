<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->text('photo');
            $table->tinyInteger('active');
            $table->unsignedInteger('alternatives_id');
            $table->unsignedInteger('questions_id');
            $table->unsignedInteger('extinguishers_id');
            $table->unsignedInteger('certifications_id');
            $table->foreign('alternatives_id')->references('id')->on('alternatives');
            $table->foreign('questions_id')->references('id')->on('questions');
            $table->foreign('extinguishers_id')->references('id')->on('extinguishers');
            $table->foreign('certifications_id')->references('id')->on('certifications');
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
        Schema::dropIfExists('checklists');
    }
}
