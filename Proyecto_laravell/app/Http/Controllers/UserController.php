<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Municipio;
use App\Models\Departamento;
use Illuminate\Http\Request;

class UserController extends Controller{
    public function index(){
        
    }

    public function create(){
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        
        return view('auth.register', ['paises' => $paises, 
        'departamentos' => $departamentos,
        'municipios' => $municipios]);
    }

    public function store(Request $request){
        
    }

    public function show(string $id){
        
    }

    public function edit(string $id){
        
    }

    public function update(Request $request, string $id){
        
    }

    public function destroy(string $id){
        
    }
}
