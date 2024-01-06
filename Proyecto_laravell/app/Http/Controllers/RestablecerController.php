<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestablecer;
use App\Mail\RestrablecerMailable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RestablecerController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        return view('auth.restablecer');
    }

    public function store(StoreRestablecer $request)
    {
        $users = User::all();
        $documento = $request->documento;
        $encontrado = false;
        $id = 0;

        foreach ($users as $user) {
            if ($user->num_documento == $documento) {
                $encontrado = true;
                $id = $user->id;
            } else {
                continue;
            }
        }

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
            return "no";
        }
    }

    public function enviar($id, $token)
    {
        $usuario = User::find($id);
        Mail::to($usuario->email)
            ->send(new RestrablecerMailable($usuario, $token));
        return redirect()->route('login');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
