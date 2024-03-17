<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VacanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vacante = [
            ['codigo' => '12345678',
            'num_vacante' => '2',
            'meses_experiencia' => '1',
            'salario' => '1000000 3000000',
            'tipo_salario' => 'Salario fijo',
            'tipo_contrato' => 'Contrato por obra o valor',
            'tipo_jornada' => 'Diurna',
            'estado' => '1',
            'empresa_id' => '1',
            'cargo_id' => '1',
            'municipio_id' => '1',]
        ];

        DB::table('vacantes')->insert($vacante);
    }
}
