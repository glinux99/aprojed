<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_sites', function (Blueprint $table) {
            $table->id();
            $table->text('presentation')->nullable();
            $table->text('culture')->nullable();
            $table->string('adresse')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagrame')->nullable();
            $table->string('rccm')->nullable();
            $table->string('bp')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('publicite_txt')->nullable();
            $table->string('email')->nullable();
            $table->string('numeropv')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();
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
        Schema::dropIfExists('config_sites');
    }
}
