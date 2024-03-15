<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeleccionadorSeeder extends Seeder{
    public function run(): void{
        $seleccionador = [
            'user_id' => '3'
        ];

        DB::table('seleccionadores')->insert($seleccionador);
    }
}
