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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('num_documento')->unique();
            $table->set('tipo_documento', ['Cedula de ciudadania',
            'Tarjeta de identidad',
            'Cedula de extranjeria',
            'Otro ducumento de identidad',
            'Permiso especial de permanencia',
            'Permiso por proteccion temporal']);
            $table->string('nombre');
            $table->string('apellido');
            $table->set('genero', ['Masculino', 'Femenino']);
            $table->set('estado_civil',
            ['Soltero', 'Casado', 'Union de hecho',
            'Seoarado', 'Divorciado', 'Viudo']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreignId('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
