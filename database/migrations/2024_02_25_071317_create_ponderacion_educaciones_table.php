<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ponderacion_educaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ponderacion');
            $table->text('descripcion')->nullable();
            $table->foreignId('postulacion_id')->references('id')->on('postulaciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ponderaciones');
    }
};
