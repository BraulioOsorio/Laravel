<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plato;
use App\Models\Categoria;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListaPlatos()
    {
        $platos = Plato::all();
        //$platos = Platos::where('status','1')->get();
        return view('ListaPlatos',compact('platos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeP(Request $request)
    {
        Plato::create($request->all());
        return redirect()->route('ListaPlatos');
    }

    public function createP(){
        $categorias = Categoria::all();
        return view('plato',compact('categorias'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateP(Request $request, Plato $platos)
    {
        $platos->update($request->all());
        return redirect()->route('ListaPlatos');
    }


    public function editP(Plato $platos){
        $categorias = Categoria::all();
        return view('plato',compact('platos','categorias'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyP(Request $request, $platos)

    {
        $platosFind = Plato::find($platos);

        if($platosFind){
            $platosFind->status= ($platosFind->status==1)? 0 : 1;
            $platosFind->save();

        }
        
        return redirect()->route('ListaPlatos');
    }
}
