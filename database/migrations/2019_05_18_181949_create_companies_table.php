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
            $table->string('cnpj', 45)->unique();
            $table->string('state_registration', 45);
            $table->string('social_name', 45);
            $table->string('fantasy_name', 45)->nullable();
            $table->string('address', 45)->nullable();
            $table->string('cep', 45)->nullable();
            $table->string('complement', 45)->nullable();
            $table->string('neighborhood', 45)->nullable();
            $table->text('signature')->nullable();
            $table->string('state', 200)->nullable();
            $table->string('city', 200)->nullable();
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
