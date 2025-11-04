<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationRdvsTable extends Migration
{
    public function up()
    {
        Schema::create('reservation_rdvs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin');
            $table->enum('statut',['en attente','comfirmer','annuler']);
            $table->time('heure_reservation');
            $table->date('date');
            $table->unsignedBigInteger('id_acte');
            $table->timestamps();

            $table->foreign('id_acte')->references('id')->on('actes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_rdvs');
    }
}

