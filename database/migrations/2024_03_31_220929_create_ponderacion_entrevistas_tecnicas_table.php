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
        Schema::create('ponderacion_entrevistas_tecnicas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ponderacion');
            $table->text('descripcion')->nullable();
            $table->foreignId('tipo_entrevista_id')->references('id')->on('tipo_entrevistas')->onDelete('cascade');
            $table->foreignId('postulacion_id')->references('id')->on('postulaciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponderacion_entrevistas_tecnicas');
    }
};
