<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\RestrablecerMailable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreRestablecer;

class RestablecerController extends Controller{
    // ------------------- CREATE -----------------------
    // Al llamar el metodo create se retornara una vista
    // la cual pedira al usuario su tipo de documento para
    // hayar el usuario y poder enviar un correo por mailtrap
    // asignandole una nueva contraseña
    public function create(){
        return view('auth.restablecer');
    }
    // --------------------------------------------------


    // ------------------- STORE ------------------------
    // Al llamar el metodo estore como primera instancia 
    // se realizara una busqueda entre todos los usuarios
    // en el campo num_documento para validar si existe el
    // documento que inserto la persona en la vista create.
    // Al ser encontrado se accede al registro de dicho
    // usuario para que por medio de un for se itere una
    // lista de caracteres para que por cada iteracion se
    // vayan agregando a una variable y esta sea la nueva
    // contraseña del usuario
    public function store(StoreRestablecer $request){
        $users = User::all();
        $documento = $request->documento;
        $encontrado = false;
        $id = 0;

        // Validacion entre todos los usuarios de la aplicacion
        // para ver se el documento coincide con el proporcionado
        foreach ($users as $user) {
            if ($user->num_documento == $documento) {
                $encontrado = true;
                $id = $user->id;
            } else {
                continue;
            }
        }

        // Si la validacion anterior fue verdadera se empieza a crear
        // la nueva contraseña del usuario por medio de iteraciones en
        // una cadena de caracteres
        if ($encontrado == true) {
            $usuario = User::find($id);
            $caracteres = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $caracteresLength = strlen($caracteres);
            $codigoAleatorio = '';

            for ($i = 0; $i < 10; $i++) {
                $indiceAleatorio = random_int(0, $caracteresLength - 1);
                $codigoAleatorio .= $caracteres[$indiceAleatorio];
            }

            return redirect()->route('restablecer.enviar', [
                'id' => $usuario->id,
                'token' => $codigoAleatorio,
            ]);
        } else {
            return redirect()->back();
        }
    }
    // --------------------------------------------------


    // ------------------- ENVIAR -----------------------
    // Al llamar el metodo enviar se recibira como parametro
    // el id del usuario y la nueva contraseña para que por
    // medio de la clase Mail y su metodo estatico to se pase
    // el correo que va a recibir el mensaje y como metodo send
    // se retorna el archivo Mailable que es el que contiene
    // el correo que lo envia el asunto y es el que retorna la
    // vista que contiene el correo que se va a enviar. Luego
    // se hace el cambio de la contraseña vieja por la nueva
    // pero hasheandola
    public function enviar($id, $token){
        $usuario = User::find($id);

        Mail::to($usuario->email)
            ->send(new RestrablecerMailable($usuario, $token));

        $usuario -> password = Hash::make($token);
        $usuario -> save();
        return redirect()->route('login');
    }
    // --------------------------------------------------

}
