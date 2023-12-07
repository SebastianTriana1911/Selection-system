<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperUsuarioSeeder extends Seeder{
    public function run(): void{
        $administrador = [
            'user_id' => '1'
        ];

        DB::table('super_usuarios')->insert($administrador);
    }
}
