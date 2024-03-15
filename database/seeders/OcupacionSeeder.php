<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OcupacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ocupacion = [
            [
                'codigo' => '25190',
                'nombre' => 'Desarrolladores y analistas de software',
                'descripcion' => 'Esta ocupacion abarca a los desarrolladores y analistas de software y multimedia no clasificados en otras ocupaciones del Subgrupo 251: Desarrolladores y analistas de software y multimedia. Por ejemplo, incluye aquellos que investigan, planifican, diseñan, evaluan, integran e implementan soluciones informaticas, sistemas operativos, almacenes de datos y software, siguiendo planes de prueba garantizado de calidad y seguridad de los datos de tecnologias de la informacion y las comunicaciones.',
                'empresa_id' => '1',
            ]
        ];

        DB::table('ocupaciones')->insert($ocupacion);
    }
}
