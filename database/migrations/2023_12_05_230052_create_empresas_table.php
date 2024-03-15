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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nit')->unique();
            $table->string('nombre');
            $table->set('tipo_empresa', ['Corporacion', 'Pequeña empresa',
            'Mediana empresa', 'Startup', 'Sin fines de lucro',
            'Privada', 'Publica']);
            $table->string('telefono');
            $table->string('correo_electronico');
            $table->string('responsable_legal');
            $table->string('direccion');      
            $table->set('producto_servicio', ['Electrónicos', 'Ropa y Accesorios',
            'Alimentos y Bebidas', 'Muebles y Decoración', 'Juguetes y Artículos para Niños',
            'Automóviles y Accesorios', 'Herramientas y Equipamiento',
            'Productos de Belleza y Cuidado Personal',
            'Artículos Deportivos', 'Tecnología de la Información (TI)',
            'Salud y Cuidado Personal', 'Educación', 'Finanzas', 'Viajes y Turismo',
            'Hostelería y Restaurantes', 'Publicidad y Marketing', 'Consultoría Empresarial',
            'Servicios Legales', 'Servicios de Mantenimiento del Hogar']);      
            $table->foreignId('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
