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
            $table->string('images')->nullable();
            $table->string('qte');
             $table->foreignId('user_id')->nullable()->unsigned();
              $table->foreignId('produit_id')->nullable()->unsigned();
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
