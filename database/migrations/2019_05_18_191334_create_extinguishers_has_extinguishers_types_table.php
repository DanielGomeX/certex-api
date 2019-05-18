<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtinguishersHasExtinguishersTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extinguishers_has_extinguishers_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('extinguishers_types_id');
            $table->unsignedInteger('extinguishers_id');
            $table->foreign('extinguishers_types_id')->references('id')->on('extinguishers_types');
            $table->foreign('extinguishers_id')->references('id')->on('extinguishers');
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
        Schema::dropIfExists('extinguishers_has_extinguishers_types');
    }
}
