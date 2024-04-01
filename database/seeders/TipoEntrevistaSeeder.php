<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoEntrevistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entrevista = [
            ['tipo' => 'Entrevista'],
            ['tipo' => 'Entrevista tecnica'],
            ['tipo' => 'Entrevista psicologica'],
        ];

        DB::table('tipo_entrevistas')->insert($entrevista);
    }
}
