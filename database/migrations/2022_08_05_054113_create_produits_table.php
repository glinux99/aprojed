<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('categorie');
            $table->string('unite')->nullable();
            $table->string('qte_min');
            $table->string('stocks_visible')->nullable();
            $table->string('qte')->nullable();
            $table->string('remboursable')->nullable();
            $table->string('prix');
            $table->string('remise')->nullable();
            $table->text('description')->nullable();
            $table->string('visible')->nullable();
            $table->string('alert');
            $table->string('expedition');
            $table->string('est_livraison')->nullable();
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
        Schema::dropIfExists('produits');
    }
}
