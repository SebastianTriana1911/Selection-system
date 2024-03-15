<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $departamento = [
            ['nombre' => 'Atlantico', 'pais_id' => 1],
            ['nombre' => 'Bolivar', 'pais_id' => 1],
            ['nombre' => 'Antioquia', 'pais_id' => 1],
        ];

        DB::table('departamentos')->insert($departamento);
    }
}
