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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ownerId');
            //$table->foreign('ownerId')->references('id')->on('users');
            $table->string('name');
            $table->integer('age');
            $table->string('color');
            $table->string('gender');
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('patientId')->nullable();
            $table->string('healthStatus')->nullable();
            $table->integer('speciesId')->unsigned();
            //$table->foreign('speciesId')->references('id')->on('species');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
