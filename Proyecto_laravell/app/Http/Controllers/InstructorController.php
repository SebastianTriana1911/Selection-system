<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\User;
use App\Models\Municipio;
use App\Models\Profesion;
use App\Models\Instructor;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreInstructor;
use App\Http\Requests\UpdateInstructor;
use Illuminate\Support\Facades\Redirect;

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


        // El instructor tambien cuenta con una o multiples profesiones por
        // eso es necesario que a la hora de crear el instructor le creemos
        // una nueva instancia a el modelo Profesion para asi relacionarlos
        // entre los dos
        $profesion = new Profesion();
        $profesion -> instructor_id = $instructor -> id;
        $profesion -> titulado = $request -> titulado;
        $profesion -> institucion = $request -> institucion;

        // En esta condicional se valida si la persona subio un documento y
        // si ese es el caso se sube el documento a una carpeta llamada
        // documento que es subcarpeta de la carpeta principal storage. Al
        // campo documento se le asigna la ruta del archivo que se subio para
        // que se pueda mostrar mediante una nueva vista
        if ($request->hasFile('documento')){
            $documento = $request->file('documento');
            $ruta = $documento->store('documentos', 'public');
            $profesion -> documento = $ruta;
            $profesion -> save();

            return redirect()->route('super.index');

        // Si la condicional da que no se a subido ningun archivo entonces ese
        // campo quedara como nulo
        }else {
            $profesion -> documento = null;
            $profesion->save();
        
            return redirect()->route('super.index');
        }
        
    }
    // ----------------------------------------------------------


    // ---------------------- METODO EDIT -----------------------
    // Al llamar el metodo edit este nos retornara una vista con 
    // diferentes instancias como lo son el usuario autenticado para
    // poder mostrar el nombre del administrador de ese momento, los 
    // paises departamentos y municipios para que se puedan seleccionar
    // y actualizar dichos campos, el instructor para colocar los campos
    // que ya tenian creados en el metodo value old() y el perfil_profesional
    // para que realizar la validacion donde si este campo esta vacio
    // muestre un mensaje
    public function edit(string $id){
        // Instancias
        $userAutenticado = Auth::user();
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $instructor = Instructor::find($id);
        $idInstructor = $instructor->id;

        // Validacion del perfil_profesional
        $perfil_profesional = '';
        if($instructor->perfil_profesional == null){
            $perfil_profesional = 'El instructor no tiene perfil profesional';
        }else {
            $perfil_profesional = $instructor->perfil_profesional;
        }

        return view('instructor.edit', ['instructor' => $instructor, 
        "administrador" => $userAutenticado, 'paises' => $paises, 
        'departamentos' => $departamentos, 'municipios' => $municipios,
        'perfil_profesional' => $perfil_profesional,
        'idInstructor' => $idInstructor]);
    }
    // ------------------------------------------------------------------------


    // ---------------------- METODO UPDATE -----------------------------------
    // Al llamar el metodo update se registrara la actualizacion del
    // registro ya existente por los nuevos registros que se hicieron
    // en el formulario que suministra la vista que retornava el metodo
    // edit, a diferencia de que a la hora de subir el numero de documento
    // decia que ya existia y es verdad, pero si no se actualizo dicho
    // numero no debia por que arrojar dicho error de validacion, por eso
    // en dicho campo utilizamos el Rule::unique()->ignore, este metodo
    // lo que quiere dar a enteneder es que al hayar un registro de un
    // formulario con el mismo valor que el registro que se encuentra en
    // la base de datos lo va a ignorar. Por ejemplo en la base de datos
    // como numero de documento aparece el 1 y en el formulario de actualizacion
    // es el mismo 1, como normalmente daria un error de validacion por que el
    // numero de documento ya existe por que ya se encuentre el 1 en la BD, lo
    // que hace dicho metodo es ignorar la regla de validacion cuando dicha
    // comparacion coincida
    public function update(Request $request, $id){
        // Instancia de la clase de instructor donde se actualizan
        // los campos correspondientes a dicha tabla
        $instructor = Instructor::find($id);
        $instructor->fecha_nacimiento = $request -> fecha_nacimiento;
        $instructor->direccion = $request -> direccion;
        $instructor->telefono = $request -> telefono;
        $instructor->perfil_profesional = $request -> perfil_profesional;
        $instructor->save();

        // Instancia de la tabla user buscando el registro que coincida
        // con el valor que tiene el campo user_id en la tabla instructores 
        $user = User::find($instructor->user_id);

        // Reglas de validacion con el plus del metodo Rule::unique()->ignore()
        // para saltar reglas de validacion siempre y cuando cumplan con una
        // condicion
        $request->validate([
            'num_documento' => [
                'required',
                'max:11',
                Rule::unique('users')->ignore($user->id),
                'min:7',
            ],
            'tipo_documento' => 'required',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'genero' => 'required',
            'estado_civil' => 'required',
            'fecha_nacimiento' => 'required|before_or_equal:2010-01-01',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
        ], [
            'num_documento.required' => 'Obligatorio',
            'num_documento.max' => 'Debe ser menos de 11',
            'num_documento.min' => 'Debe ser mas de 7',
            'num_documento.unique' => 'Ya existe',
            'tipo_documento.required' => 'Obligatorio',
            'nombre.required' => 'Obligatorio',
            'nombre.string' => 'No se aceptan numeros',
            'apellido.required' => 'Obligatorio',
            'apellido.string' => 'No se aceptan numeros',
            'genero.required' => 'Obligatorio',
            'estado_civil.required' => 'Obligatorio',
            'fecha_nacimiento.required' => 'Obligatorio',
            'fecha_nacimiento.before_or_equal' => 'Debe ser menor a 2010-01-01',
            'direccion.required' => 'Obligatorio',
            'telefono.request' => 'Obligatorio',
            'email.required' => 'Obligatorio',
            'email.email' => 'Debe ser un email',
            'email.unique' => 'Ya existe',
        ]);
        if($request -> num_documento == $user -> num_documento){
            $user->num_documento = $request -> num_documento;
            $user->save();
        }
        $user->tipo_documento = $request -> tipo_documento;
        $user->nombre = $request -> nombre;
        $user->apellido = $request -> apellido;
        $user->genero = $request -> genero;
        $user->estado_civil = $request ->estado_civil;

        if($user->email == $request -> email){
            $user->email = $request -> email;
            $user->save();
        }
        $user->save();

        
        return redirect()->route('super.index');
    }
    // ------------------------------------------------------------------------
}
