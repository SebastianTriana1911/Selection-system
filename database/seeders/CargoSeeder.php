<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cargo = [
            ['cargo' => 'Ingeniero de software',
            'habilidad' => 'Profesional encargado del análisis, diseño, desarrollo y mantenimiento de software.',
            'competencia' => 'Pensamiento Analitico, Adaptabilidad, Trabajo en equipo, Creatividad, Gestion del tiempo, Aprendizaje en conjunto.',
            'ocupacion_id' => '1',
            'empresa_id' => '1',
            ]
        
        ];

        DB::table('cargos')->insert($cargo);
    }
}
