<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('id_patient');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('seances');
    }
}
