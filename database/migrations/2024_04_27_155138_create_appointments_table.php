<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('petId');
            //$table->foreign('petId')->references('id')->on('pets')->onDelete('cascade');
            $table->unsignedBigInteger('doctorId');
            //$table->foreign('doctorId')->references('id')->on('users')->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->string('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
