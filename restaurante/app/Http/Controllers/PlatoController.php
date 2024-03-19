<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Plato;
use App\Models\Categoria;
use App\Http\Requests\PlatoRequest;

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
    public function storeP(PlatoRequest $request)
    {

        try {
            
            Plato::create($request->all());
            return redirect()->route('ListaPlatos')->with('success','Plato Creado');
        } catch (QueryException $ex) {
            
            return redirect()->route('createP')->with('danger','Plato no Creado');
        }
    }

    public function createP(){
        $categorias = Categoria::where('status','1')->get();
        return view('plato',compact('categorias'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateP(PlatoRequest $request, Plato $platos)
    {

        try {
            
            $platos->update($request->all());
            return redirect()->route('ListaPlatos')->with('success','Plato Actualizado');;
        } catch (QueryException $ex) {
            return redirect()->route('ListaPlatos')->with('danger','Plato no Actualizado');;

        }
    }


    public function editP(Plato $platos){
        $categorias = Categoria::where('status','1')->get();
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
        
        return redirect()->route('ListaPlatos')->with('success','Plato Eliminado');;
    }
}
