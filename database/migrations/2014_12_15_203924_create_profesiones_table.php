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
        Schema::create('profesiones', function (Blueprint $table) {
            $table->id();
            $table->string('titulado')->nullable();
            $table->string('institucion')->nullable();
            $table->string('documento')->nullable();
            $table->foreignId('instructor_id')->references('id')->on('instructores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesiones');
    }
};
