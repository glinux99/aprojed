<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('adresse_id')->nullable();
            $table->bigInteger('users_id')->nullable();
            $table->string('qte')->nullable();
            $table->string('images')->nullable();
            $table->bigInteger('produit_id')->nullable();
            $table->string('commande_id')->nullable();
            $table->string('total')->nullable();
            $table->string('status')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->nullable()->unsigned();
            $table->foreign('produit_id')->references('id')->on('produits')->unsigned();
            $table->foreign('adresse_id')->references('id')->on('adresses')->unsigned();

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
        Schema::dropIfExists('commandes');
    }
}
