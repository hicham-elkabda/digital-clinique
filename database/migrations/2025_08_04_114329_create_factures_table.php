<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant_total', 10, 2);
            $table->date('date');
            $table->unsignedBigInteger('id_patient');
            $table->timestamps();

            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('factures');
    }
}

