<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domicilio;
use App\Models\Plato;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListaPedidos()
    {
        $pedidos = Domicilio::all();
        //$platos = Platos::where('status','1')->get();
        return view('ListaPedidos',compact('pedidos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeD(Request $request)
    {
        Domicilio::create($request->all());
        return redirect()->route('ListaPedidos');
    }

    public function createD(){
        $platos = Plato::where('status','1')->get();

        return view('pedido',compact('platos'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateD(Request $request, Domicilio $pedidos)
    {
        $pedidos->update($request->all());
        return redirect()->route('ListaPedidos');
    }


    public function editD(Domicilio $pedidos){
        $platos = Plato::where('status','1')->get();
        return view('pedido',compact('pedidos','platos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyD(Request $request, $pedidos)

    {
        $pedidosFind = Domicilio::find($pedidos);

        if($pedidosFind){
            $pedidosFind->status= ($pedidosFind->status==1)? 0 : 1;
            $pedidosFind->save();

        }
        
        return redirect()->route('ListaPedidos');
    }
}
