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
        Schema::create('pet_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('petId');
            //$table->foreign('petId')->references('id')->on('pets')->onDelete('cascade');
            $table->unsignedInteger('serviceTypeId');
            //$table->foreign('serviceTypeId')->references('id')->on('type_of_services')->onDelete('cascade');
            $table->date('date');
            $table->string('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_services');
    }
};
