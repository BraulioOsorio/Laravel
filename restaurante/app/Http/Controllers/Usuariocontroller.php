<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class Usuariocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListaUsuarios()
    {
        $usuarios = Usuario::all();
        return view('ListaUsuarios',compact('usuarios'));
    }

    public  function createU(){
        return view('usuario');

    } 

    /**
     * Store a newly created resource in storage.
     */
    public function storeU(Request $request)
    {
        Usuario::create($request->all());
        return redirect()->route('ListaUsuarios');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateU(Request $request, Usuario $usuarios)
    {
        $usuarios->update($request->all());
        return redirect()->route('ListaUsuarios');
    }

    public function editU(Usuario $usuarios){
        return view('usuario',compact('usuarios'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyU(Usuario $usuarios)
    {
        $usuarios->delete();
        return redirect()->route('ListaUsuarios');
    }
}
