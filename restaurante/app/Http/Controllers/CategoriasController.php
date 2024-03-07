<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

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
    public function store(Request $request)
    {
        Categoria::create($request->all());
        return redirect()->route('ListaCategorias');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categorias)
    {
        $categorias->update($request->all());
        return redirect()->route('ListaCategorias');
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
        
        return redirect()->route('ListaCategorias');
    }
}
