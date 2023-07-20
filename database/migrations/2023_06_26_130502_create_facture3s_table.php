<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacture3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture3s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->contrained();
            $table->integer('total');
            $table->string('type');
            $table->string('code_fac');
            $table->foreignId('fournisseur_id')->contrained();
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
        Schema::dropIfExists('facture3s');
    }
}
