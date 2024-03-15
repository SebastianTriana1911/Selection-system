<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SuperUsuario;
use Illuminate\Database\Seeder;
use Database\Seeders\SeleccionadorSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this -> call([RolSeeder::class]);
        $this -> call([PaisSeeder::class]);
        $this -> call([DepartamentoSeeder::class]);
        $this -> call([MunicipioSeeder::class]);
        $this -> call([UserSeeder::class]);
        $this -> call([SuperUsuarioSeeder::class]);
        $this -> call([ReclutadorSeeder::class]);
        $this -> call([SeleccionadorSeeder::class]);
        $this -> call([EmpresaSeeder::class]);
    }
}
