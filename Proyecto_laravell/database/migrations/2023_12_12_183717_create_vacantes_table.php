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
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->bigInteger('num_vacante');
            $table->string('meses_experiencia')->nullable();
            $table->string('salario');
            $table->enum('tipo_salario',['Salario fijo',
            'Salario mixto', 'Salario en especie',
            'Salario en metalico']);
            $table->enum('tipo_contrato',['Contrato por obra o valor', 'Contrato de trabajo a término fijo', 'Contrato de trabajo a término indefinido', 'Contrato de aprendizaje', 'Contrato temporal', 'Contrato ocasional o accidental']);
            $table->enum('tipo_jornada',['Diurna', 'Nocturna', 'Mixta']);
            $table->boolean('estado')->default(1);
            $table->foreignId('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreignId('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->foreignId('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacantes');
    }
};
