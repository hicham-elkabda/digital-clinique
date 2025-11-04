<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoinDentairesTable extends Migration
{
    public function up()
    {
        Schema::create('soin_dentaires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_seance');
            $table->unsignedBigInteger('id_acte');
            $table->unsignedBigInteger('id_dent');
            $table->text('remarque')->nullable();
            $table->timestamps();

            $table->foreign('id_seance')->references('id')->on('seances')->onDelete('cascade');
            $table->foreign('id_acte')->references('id')->on('actes')->onDelete('cascade');
            $table->foreign('id_dent')->references('id')->on('dents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('soin_dentaires');
    }
}
