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
             $table->foreignId('user_id')->nullable()->unsigned();
              $table->foreignId('produit_id')->nullable()->unsigned();
               $table->foreignId('categorie_id')->nullable()->unsigned();
                $table->foreignId('actualite_id')->nullable()->unsigned();
                 $table->foreignId('config_site_id')->nullable()->unsigned();

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
