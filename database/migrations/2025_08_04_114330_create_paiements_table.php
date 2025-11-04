<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant', 10, 2);
            $table->date('date');
            $table->unsignedBigInteger('id_facture');
            $table->timestamps();

            $table->foreign('id_facture')->references('id')->on('factures')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('paiements');
    }
}
