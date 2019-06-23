<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtinguishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extinguishers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 50);
            $table->string('numeration', 50);
            $table->string('capacity', 50);
            $table->string('charge', 50);
            $table->datetime('charge_date');
            $table->datetime('validate_date');
            $table->text('location');
            $table->unsignedInteger('manufacturers_id');
            $table->unsignedInteger('companies_id');
            $table->foreign('manufacturers_id')->references('id')->on('manufacturers');
            $table->foreign('companies_id')->references('id')->on('companies');
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
        Schema::dropIfExists('extinguishers');
    }
}
