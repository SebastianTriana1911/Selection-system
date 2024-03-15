<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ponderaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ponderacion');
            $table->foreignId('postulacion_id')->references('id')->on('postulaciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ponderaciones');
    }
};
