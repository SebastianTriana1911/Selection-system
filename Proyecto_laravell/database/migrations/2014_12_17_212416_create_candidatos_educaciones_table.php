<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('candidatos_educaciones', function (Blueprint $table) {
            $table->id();
            $table->date('año_inicio');
            $table->date('año_finalizacion');
            $table->string('institucion');
            $table->string('titulado');
            $table->enum('nivel_estudio',['Bachiller', 'Tecnico', 'Tecnologo',
            'Pregrado', 'Posgrado', 'Especializacion', 'Doctorado']);
            $table->string('documento');    
            $table->foreignId('candidato_id')->references('id')->on('candidatos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatos_educaciones');
    }
};
