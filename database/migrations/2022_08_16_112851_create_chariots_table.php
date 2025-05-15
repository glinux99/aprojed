<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChariotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chariots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id');
            $table->bigInteger('produit_id');
            $table->string('images')->nullable();
            $table->string('qte');
            $table->foreign('users_id')->references('id')->on('users')->nullable()->unsigned();
            $table->foreign('produit_id')->references('id')->on('produits')->nullable()->unsigned();
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
        Schema::dropIfExists('chariots');
    }
}
