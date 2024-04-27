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
        Schema::create('boardings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('petId');
            //$table->foreign('petId')->references('id')->on('pets')->onDelete('cascade');
            $table->unsignedBigInteger('roomId');
            //$table->foreign('roomId')->references('id')->on('rooms')->onDelete('cascade');
            $table->date('startTime');
            $table->date('endTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boardings');
    }
};
