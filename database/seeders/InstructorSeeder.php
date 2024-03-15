<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructor = [
            'fecha_nacimiento' => '19/11/1980',
            'direccion' => 'Cra2 #35-20',
            'telefono' => '212122222',
            'perfil_profesional' => 'Nada',
            'user_id' => '3'
        ];

        DB::table('instructores')->insert($instructor);
    }
}
