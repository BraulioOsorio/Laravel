<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Database\QueryException;



class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListaCategorias()
    {
        $categorias = Categoria::all();
        //$categorias = Categoria::where('status','1')->get();
        return view('ListaCategorias',compact('categorias'));
    }

    public function create(){
        return view('categorias');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        try {
            Categoria::create($request->all());
            return redirect()->route('ListaCategorias')->with('success','Categoria Creada');
        } catch (QueryException $ex) {
            return redirect()->route('create')->with('danger','Categoria no creada');

        }

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, Categoria $categorias)
    {

        try {
            $categorias->update($request->all());
            return redirect()->route('ListaCategorias')->with('success','Categoria Actualizada');
            
        } catch (QueryException $ex) {
            return redirect()->route('ListaCategorias')->with('danger','Categoria no Actualizada');   
        }
    }

    public function edit(Categoria $categorias){
        return view('categorias',compact('categorias'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $categorias)
    {
        $categoriaFind = Categoria::find($categorias);

        if($categoriaFind){
            $categoriaFind->status= ($categoriaFind->status==1)? 0 : 1;
            $categoriaFind->save();

        }
        
        return redirect()->route('ListaCategorias')->with('danger','Categoria Eliminada');
    }
}
