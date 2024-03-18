<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducacionVacanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $edu = [
            ['nivel_estudio' => 'Bachiller',
            'puntos' => '1',
            'titulado' => 'Bachiller academico',
            'descripcion' => 'Un bachiller académico es un título otorgado a los estudiantes 
            que completan con éxito la educación secundaria, generalmente después de cursar un
            plan de estudios que abarca una variedad de materias académicas. Esta titulación demuestra
            que el estudiante ha adquirido conocimientos y habilidades en áreas como matemáticas,
            ciencias, humanidades, idiomas, artes y educación física. Los requisitos específicos para
            obtener un bachiller académico pueden variar según el país o el sistema educativo, pero
            generalmente incluyen la superación de exámenes en diferentes materias y la finalización
            de un número mínimo de créditos académicos. Este título suele ser un requisito previo para
            acceder a la educación superior en muchas instituciones y puede ser el punto de partida para
            una variedad de carreras profesionales y académicas.',
            'vacante_id' => '1'
            ]
        ];

        DB::table('educacion_vacantes')->insert($edu);
    }
}
