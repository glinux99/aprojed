<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->string('adresse');
            $table->string('pays');
            $table->string('ville');
            $table->string('code_postal')->nullable();
            $table->string('numero');
            $table->string('email');
            $table->bigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->nullable()->unsigned();
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
        Schema::dropIfExists('adresses');
    }
}
