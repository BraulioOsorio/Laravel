<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Database\QueryException;


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
    public function storeU(UsuarioRequest $request)
    {

        try {
            
            Usuario::create($request->all());
            return redirect()->route('ListaUsuarios')->with('success','Usuario Creado');
        } catch (QueryException $ex) {
            return redirect()->route('createU')->with('danger','Usuario no Creado');
            
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
     * Update the specified resource in storage.
     */
    public function updateU(UsuarioRequest $request, Usuario $usuarios)
    {
        try {
            
            $usuarios->update($request->all());
            return redirect()->route('ListaUsuarios')->with('success','Usuario Actualizado');
        } catch (QueryException $ex) {
            return redirect()->route('ListaUsuarios')->with('danger','Usuario no Actualizado');
            
        }
    }

    public function editU(Usuario $usuarios){
        return view('usuario',compact('usuarios'));

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroyU(Request $request, $usuarios)
    {
        $userFind = Usuario::find($usuarios);

        if($userFind){
            $userFind->status= ($userFind->status==1)? 0 : 1;
            $userFind->save();

        }
        
        return redirect()->route('ListaUsuarios')->with('success','Usuario Eliminado');
    }
}
