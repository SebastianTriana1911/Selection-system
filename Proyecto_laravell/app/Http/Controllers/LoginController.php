<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    public function index(){
        
    }

    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        if(!auth()->attempt($request->only('email', 'password'))){
            return redirect()->back();
        }

        $user = Auth::user();

        if($user->role_id==1){
            return redirect()->route('super.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
