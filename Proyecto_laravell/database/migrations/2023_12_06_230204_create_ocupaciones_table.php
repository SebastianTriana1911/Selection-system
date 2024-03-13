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
        Schema::create('ocupaciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->unique(['id', 'codigo']);
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->foreignId('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocupaciones');
    }
};
