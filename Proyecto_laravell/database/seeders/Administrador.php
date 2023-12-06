<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Administrador extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $administrador = [
            'num_documento' => '101078445',
            'tipo_documento' => 'Cedula de ciudadania',
            'nombre' => 'Sebastian',
            'apellido' => 'Triana',
            'genero' => 'Masculino'
        ];
    }
}
