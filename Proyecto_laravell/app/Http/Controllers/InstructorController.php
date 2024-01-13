<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\User;
use App\Models\Municipio;
use App\Models\Instructor;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInstructor;
use App\Models\Profesion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller{
    // ---------------------- METODO CREATE ----------------------
    public function create(){

        // Al llamar el metodo create mostraremos la vista la cual
        // contiene el formulario para crear un instructor, como
        // dicho instructor tiene el campo Pais, Departamento y
        // Municipio y dichos campos estan relacionadas a tablas 
        // con registros previamente insertados, para mostrarlos
        // por medio de un select en la vista llamamos el modelo
        // que apunta a la tabla de cada una de ellas con el metodo
        // estatico all() para que pueda iterar cada uno de los
        // registros por medio de un foreach  
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        
        // Se retorna la vista que contiene el formulario y se le
        // asignan las variables que contienen todos los registros de
        // las tablas ya mencionadas para que las itere
        return view('instructor.create', ['paises' => $paises, 
        'departamentos' => $departamentos,
        'municipios' => $municipios]);
    }
    // ----------------------------------------------------------

    // ---------------------- METODO STORE ----------------------
    public function store(StoreInstructor $request){
        // Al llamar el metodo store vamos a hacer la insercion de
        // un nuevo registro de la tabla users pues recordemos que
        // en este caso un instructor es un usuario, asi que se
        // crea una instancia del modelo user
        $user = new User();

        // Se accede a cada uno de los campos de la tabla users y se
        // remplazan por los campos del formulario que retorna el
        // metodo create para finalmente salvarlo en la base de datos
        $user -> num_documento = $request -> num_documento;
        $user -> tipo_documento = $request -> tipo_documento;
        $user -> nombre = $request -> nombre;
        $user -> apellido = $request -> apellido;
        $user -> genero = $request -> genero;
        $user -> estado_civil = $request -> estado_civil;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request->password);
        $user -> municipio_id = $request -> municipio_id;
        $user -> role_id = $request -> role_id;
        $user -> save();

        // Se crea una instancia del modelo instructor pues es este
        // al que estamos creando pero como el instructor es un usuario
        // debemos de crear el registro en la tabla users para acceder
        // al id de este registro y asignarselo al registro de la tabla
        // instructores
        $instructor = new Instructor();

        // La tabla users solo tiene un campo y es su campo foraneo asi
        // que accedemos a dicho campo y le asignamos la instancia del
        // modelo users que fue el registro que se creo previamente en 
        // el campo id. Esto quiere decir que el valor del campo user_id
        // de la tabla instructores corresponde al registro con el mismo
        // valor en el campo id de la tabla users 
        $instructor -> user_id = $user -> id;
        $instructor -> fecha_nacimiento = $request -> fecha_nacimiento;
        $instructor -> direccion = $request -> direccion;
        $instructor -> telefono = $request -> telefono;
        $instructor -> perfil_profesional = $request -> perfil_profesional; 
        $instructor -> save();


        $profesion = new Profesion();
        $profesion -> instructor_id = $instructor -> id;
        $profesion -> titulado = $request -> titulado;
        $profesion -> institucion = $request -> institucion;

        if ($request->hasFile('documento')){
            $documento = $request->file('documento');
            $ruta = $documento->store('documentos', 'public');
            $profesion -> documento = $ruta;
            $profesion -> save();

            return redirect()->route('super.index');
        }else {
            $profesion -> documento = null;
            $profesion->save();
        
            return redirect()->route('super.index');
        }
        
    }
    // ----------------------------------------------------------


    public function show(string $id){
        
    }

    public function edit(string $id){
        
    }

    public function update(Request $request, string $id){
        
    }

    public function destroy(string $id){
        
    }
}
