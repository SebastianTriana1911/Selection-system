<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReclutadorSeeder extends Seeder{
    public function run(): void{
        $reclutador = [
            ['user_id' =>'4']
        ];

        DB::table('reclutadores')->insert($reclutador);
    }
}
