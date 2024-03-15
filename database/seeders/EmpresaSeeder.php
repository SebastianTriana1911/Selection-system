<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresa = [
            ['nit' => '157456182',
            'nombre' => 'Selection System',
            'tipo_empresa' => 'Pequeña empresa',
            'telefono' => '3134755526',
            'correo_electronico' => 'selectionSystem@gmail.com',
            'responsable_legal' => 'Johan Sebastian Triana Camacho',
            'direccion' => 'Cra2 #36-10',
            'producto_servicio' => 'Tecnologia de la informacion (TI)',
            'municipio_id' => '1'],
        ];

        DB::table('empresas')->insert($empresa);
    }
}
