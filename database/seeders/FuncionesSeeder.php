<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FuncionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $funcion = [
            [
            'funcion' => 'Desarrollar, ejecutar, analizar y documentar los planes y resultados de proyectos multimedia, aplicacion de las pruebas de software, sistemas de informacion y sistemas de telecomunicaciones.',
            'descripcion' => 'El participante debera de cumplir con las siguientes habilidades "funciones" para poder impartir en su totalidad la ocupacion asignada.',
            'ocupacion_id' => '1',
            ]
        ];
        DB::table('funciones')->insert($funcion);
    }
}
