<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $municipio = [
            ['nombre' => 'Barranquilla', 'departamento_id' => 1],
            ['nombre' => 'Cartagena', 'departamento_id' => 2],
            ['nombre' => 'Medellin', 'departamento_id' => 3],
        ];

        DB::table('municipios')->insert($municipio);
    }
}
