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
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('petId');
            //$table->foreign('petId')->references('id')->on('pets')->onDelete('cascade');
            $table->date('appointmentDate');
            $table->text('symptoms');
            $table->text('diagnosis')->nullable();
            $table->text('reminder')->nullable();
            $table->date('recheckDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
