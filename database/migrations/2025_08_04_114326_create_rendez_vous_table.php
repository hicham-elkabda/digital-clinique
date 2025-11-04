<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezVousTable extends Migration
{
    public function up()
    {
        Schema::create('rendez_vous', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('heure');
            $table->unsignedBigInteger('id_acte');
            $table->enum('statut',['en attente','comfirmer','annuler']);
            $table->unsignedBigInteger('id_patient');
            $table->timestamps();

            $table->foreign('id_acte')->references('id')->on('actes')->onDelete('cascade');
            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rendez_vous');
    }
}

