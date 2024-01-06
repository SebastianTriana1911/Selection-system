<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $pais = [
            ['nombre' => 'Colombia'],
            ['nombre' => 'Venezuela'],
            ['nombre' => 'Argentina'],
            ['nombre' => 'Argentina'],
        ];

        DB::table('paises')->insert($pais);
    }
}
