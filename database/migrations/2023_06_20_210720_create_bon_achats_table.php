<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fournisseur_id')->contraind();
            $table->integer('prixU');
            $table->string('quanditeU');
            $table->integer('totalU');
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
        Schema::dropIfExists('bon_achats');
    }
}
