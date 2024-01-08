<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurarPassword;
use App\Models\Pais;
use App\Models\User;
use App\Models\Candidato;
use App\Models\Municipio;
use App\Models\Instructor;
use App\Models\Reclutador;
use App\Models\Departamento;
use App\Models\SuperUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    // -------------------------- METODOS CREATE --------------------------
    // Este metodo es el que retorna la vista para registrar un candidato, 
    // Se hace el llamado de los modelos de pais, departamento y municipio
    // con el metodo all para en la vista poderlos iterar por medio de un
    // foreach y asi mostrar todos los paises que contiene cada tabla en 
    // dicho momento
    public function create()
    {
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();

        return view('auth.register', [
            'paises' => $paises,
            'departamentos' => $departamentos,
            'municipios' => $municipios
        ]);
    }
    // ---------------------------------------------------------------------


    // -------------------------- METODOS DESTROY ------------------------
    // El metodo destroy como se encuentra dentro del controlador User se
    // puede utilizar para eliminar cualquier registro de las tablas que
    // dependen de esta, recordemos que en este caso estan Super Usuarios,
    // Instructores, Candidatos, Seleccionadores y Reclutadores, asi que para
    // eliminar alguno de estos se debe de acceder a este metodo con su id
    // correspondiente para buscar dicho registro por medio del metodo estatico
    // find
    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('super.index');
    }
    // -------------------------------------------------------------------


    // --------------------- METODO CAMBIO DE ROL ------------------------
    // El metodo cambio de rol permite buscar mediante su id el registro
    // completo para asi validar si el campo role_id pertenece en este caso
    // a un candidato, se hace una validacion donde se busca en la tabla
    // candidato si el campo user_id es igual al id de la tabla user si ese
    // es el caso se elimina dicho registro, para luego validar cual fue el
    // rol al cual cambio y al registro que queda en la tabla usuario se actualiza
    // el campo role_id para luego salvarlo en su tabla correspondiente 
    public function cambioRol(Request $request, $id){
        $usuario = User::find($id);

        if ($usuario->role_id == 1) {
            $candidato = SuperUsuario::where('user_id',  $usuario->id)->first();
            $candidato->delete();

            if ($request->menu == 2) {
                $usuario->role_id = $request->menu;
                $usuario->save();

                $super = new Candidato();
                $super->user_id = $usuario->id;

                $super->save();
                return redirect()->back();
            } else if ($request->menu == 3) {
                $usuario->role_id = $request->menu;
                $usuario->save();

                $instructor = new Instructor();
                $instructor->user_id = $usuario->id;

                $instructor->save();
                return redirect()->back();
            }
            // else if($request -> menu == 4){
            //     $usuario -> role_id = $request -> menu;
            //     $usuario -> save();

            //     $seleccionador = new Seleccionador();
            //     $seleccionador -> user_id = $usuario -> id;

            //     $seleccionador->save();
            //     return redirect()->route('super.index');
            // }
            else if ($request->menu == 5) {
                $usuario->role_id = $request->menu;
                $usuario->save();

                $reclutador = new Reclutador();
                $reclutador->user_id = $usuario->id;

                $reclutador->save();
                return redirect()->route('super.index');
            }
        }

        // Validacion donde se comprueba si el usuario al que se desea 
        // cambiar el rol es un candidato
        if ($usuario->role_id == 2) {
            $candidato = Candidato::where('user_id',  $usuario->id)->first();
            $candidato->delete();

            if ($request->menu == 1) {
                $usuario->role_id = $request->menu;
                $usuario->save();

                $super = new SuperUsuario();
                $super->user_id = $usuario->id;

                $super->save();
                return redirect()->back();
            } else if ($request->menu == 3) {
                $usuario->role_id = $request->menu;
                $usuario->save();

                $instructor = new Instructor();
                $instructor->user_id = $usuario->id;

                $instructor->save();
                return redirect()->back();
            }
            // else if($request -> menu == 4){
            //     $usuario -> role_id = $request -> menu;
            //     $usuario -> save();

            //     $seleccionador = new Seleccionador();
            //     $seleccionador -> user_id = $usuario -> id;

            //     $seleccionador->save();
            //     return redirect()->route('super.index');
            // }
            // else if($request -> menu == 5){
            //     $usuario -> role_id = $request -> menu;
            //     $usuario -> save();

            $reclutador = new Reclutador();
            $reclutador->user_id = $usuario->id;

            $reclutador->save();
            return redirect()->route('super.index');
        }

        if ($usuario->role_id == 3) {
            $instructor = Instructor::where('user_id',  $usuario->id)->first();
            $instructor->delete();

            if ($request->menu == 1) {
                $usuario->role_id = $request->menu;
                $usuario->save();

                $admin = new SuperUsuario();
                $admin->user_id = $usuario->id;

                $admin->save();

                return redirect()->back();
            } else if ($request->menu == 2) {
                $usuario->role_id = $request->menu;
                $usuario->save();

                $candidato = new Candidato();
                $candidato->user_id = $usuario->id;

                $candidato->save();
                return redirect()->back();
            }
            // else if($request -> menu == 4){
            //     $usuario -> role_id = $request -> menu;
            //     $usuario -> save();

            //     $seleccionador = new Seleccionador();
            //     $seleccionador -> user_id = $usuario -> id;

            //     $seleccionador->save();
            //     return redirect()->route('super.index');
            // }
            else if ($request->menu == 5) {
                $usuario->role_id = $request->menu;
                $usuario->save();

                $reclutador = new Reclutador();
                $reclutador->user_id = $usuario->id;

                $reclutador->save();
                return redirect()->route('super.index');
            }
        }
    }
    // -------------------------------------------------------------------


    // --------------------- METODO RESTAURAR CREATE ---------------------
    // Este metodo retornara una vista que pedira la contraseña actual que
    // tenga el usuario, la nueva contraseña y la confirmacion de la nueva
    // contraseña
    public function restaurarCreate(){
        return view('auth.restaurar');
    }
    // -------------------------------------------------------------------


    // ------------------ METODO RESTAURAR CONTRASEÑA --------------------
    // Al llamar el metodo restaurarContraseña se accede al usuario 
    // autenticado para acceder a la contraseña de dicho usuario. Como la
    // contraseña del usuario esta hasheada para acceder a la contraseña
    // normal accedemos a la clase Hash con el metodo estatico check, esta
    // recibira dos parametros el primero sera la contraseña que deseamos
    // validar y como segundo parametro la contraseña del usuario. Luego de
    // validar que las dos contraseñas coincidan se valida si la contraseña
    // nueva es igual a la contraseña de verificacion para luego asi proceder
    // a cambiar la contraseña del usuario autenticado hasheandola, para asi
    // cerrarle la sesion y volverlo a la ruta login
    public function restaurarContraseña(RestaurarPassword $request){
        $usuario = Auth::user();

        // Hash::check hace la validacion entre los dos parametros que
        // se le asignen y deshashea las contraseñas que esten hashadas
        // para asi poder realizar la validacion
        if (Hash::check($request->contraseña_old, $usuario->password)){
            if ($request->contraseña_new == $request->contraseña_verifi){

                $usuarioNewPassword = User::find($usuario->id);
                $usuarioNewPassword->password = Hash::make($request->contraseña_new);
                $usuarioNewPassword->save();

                // Cierre de la sesion del usuario autenticado 
                auth()->logout();
                session()->invalidate();
                return redirect()->route('login');
            }else{
                return redirect()->back();
            }
        };
    }
    // -------------------------------------------------------------------


    // ----------------------- METODO RESTAURAR HOME ----------------------
    // El metodo restaurarHome funcionara para que a la hora de entrar a la
    // vista de restaurar la contraseña al darle al boton de atras se muestre
    // la pantalla de inicio segun el usuario auntenticado, esto se realiza 
    // de esta manera para no hacer el mismo codigo en cada uno de los roles
    // si no que en un solo metodo validar el usuario que este auntenticado
    // y dependiendo de su rol le retorne la vista de inicio que le corresponda
    public function restaurarHome(){
        $user = Auth::user();

        if ($user->role_id == 1) {
            return redirect()->route('super.index');
        }
    }
    // -------------------------------------------------------------------
}
