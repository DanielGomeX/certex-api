<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cnpj', 45);
            $table->string('state_registration', 45);
            $table->string('social_name', 45);
            $table->string('fantasy_name', 45);
            $table->string('address', 45)->nullable();
            $table->string('cep', 45)->nullable();
            $table->string('complement', 45)->nullable();
            $table->string('neighborhood', 45)->nullable();
            $table->text('signature')->nullable();
            $table->unsignedInteger('cities_id');
            $table->foreign('cities_id')->references('id')->on('cities');
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
        Schema::dropIfExists('companies');
    }
}
