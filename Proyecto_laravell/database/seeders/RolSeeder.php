<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $rol = [
            ['rol' => 'Administrador', 'descripcion' => 'Un administrador es una persona con visión, que es capaz de aplicar y desarrollar todos los conocimientos acerca de la planeación, organización, dirección y control empresarial, donde sus objetivos están en la misma dirección de las metas y propósitos de la empresa o institución.'],

            ['rol' => 'Candidato', 'descripcion' => 'Dentro del ámbito laboral es frecuente hacer uso del término candidato. En concreto, este se emplea para referirse a todas aquellas personas que acuden a una empresa con el claro objetivo de poder ocupar el puesto que ha quedado libre o que ahora se ofrece porque es necesario cubrirlo.'],

            ['rol' => 'Instructor', 'descripcion' => 'Un instructor de trabajos debe ser un mentor dispuesto a apoyar a sus compañeros. Debe ser capaz de descubrir los puntos fuertes y débiles de las personas y explicarles qué funciona mejor para ellos. Tener habilidades de comunicación además de un pensamiento crítico son requisitos indispensables para este puesto.'],

            ['rol' => 'Seleccionador', 'descripcion' => 'El encargado de un equipo de fútbol de una determinada liga, se le llama entrenador; mientras el responsable de una selección de fútbol que representa a un país; se le llama, seleccionador.'],

            ['rol' => 'Reclutador', 'descripcion' => 'Llamamos reclutador o buscatalentos a aquel profesional cuya función consiste en buscar talento humano para cubrir los puestos de trabajo vacantes que tenga la empresa.'],
        ];

        DB::table('roles')->insert($rol);
    }
}
