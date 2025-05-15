<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('images')->nullable();
            $table->string('documents')->nullable();
            $table->string('lien')->nullable();
            $table->string('video')->nullable();
            $table->string('pub_images')->nullable();
            $table->string('center_images')->nullable();
            $table->bigInteger('actualite_id')->nullable();
            $table->bigInteger('users_id')->nullable();
            $table->bigInteger('produit_id')->nullable();
            $table->bigInteger('categorie_id')->nullable();
            $table->bigInteger('config_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->nullable()->unsigned();
            $table->foreign('produit_id')->references('id')->on('produits')->nullable()->unsigned();
            $table->foreign('categorie_id')->references('id')->on('categories')->nullable()->unsigned();
            $table->foreign('actualite_id')->references('id')->on('actualites')->nullable()->unsigned();
            $table->foreign('config_id')->references('id')->on('config_sites')->nullable()->unsigned();
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
        Schema::dropIfExists('images');
    }
}
