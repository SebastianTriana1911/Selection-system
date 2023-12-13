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
        Schema::create('educacion_vacantes', function (Blueprint $table) {
            $table->id();
            $table->enum('nivel_estudio',['Bachiller', 'Tecnico', 'Tecnologo',
            'Pregrado', 'Posgrado', 'Especializacion', 'Doctorado']);
            $table->text('descripcion');
            $table->bigInteger('puntos');
            $table->foreignId('vacante_id')->references('id')->on('vacantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educacion_vacantes');
    }
};
