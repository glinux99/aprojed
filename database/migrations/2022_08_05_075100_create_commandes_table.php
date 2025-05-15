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

            $table->string('qte')->nullable();
            $table->string('images')->nullable();
            $table->string('commande_id')->nullable();
            $table->string('total')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('user_id')->nullable()->unsigned();
            $table->foreignId('produit_id')->nullable()->unsigned();
            $table->foreignId('adresse_id')->nullable()->unsigned();

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
