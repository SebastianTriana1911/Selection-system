<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('candidatos_experiencias', function (Blueprint $table) {
            $table->id();
            $table->date('año_inicio');
            $table->date('año_finalizacion');
            $table->string('nombre_empresa');
            $table->bigInteger('meses');
            $table->string('certificacion_laboral');
            $table->text('descripcion');
            $table->foreignId('candidato_id')->references('id')->on('candidatos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('candidatos_experiencias');
    }
};
