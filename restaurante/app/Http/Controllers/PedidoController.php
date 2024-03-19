<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domicilio;
use App\Models\Plato;
use App\Http\Requests\PedidoRequest;
use App\Models\Cupon;
use Illuminate\Database\QueryException;


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
    public function storeD(PedidoRequest $request)
    {

        try {
            $cupon = Cupon::where('codigo_cupon',$request->cupon_id)->first();
    
            if(!$cupon){
                return redirect()->route('createD')->with('danger','Cupon No Existe');
                
            }else{
                
                $cuponId = $cupon ? $cupon->id : null;
                $plato = Plato::find($request->plato_id);
                $precioPlato = $plato->precio;
                $descuentoCupon = $cupon->porcentaje / 100;
                $precioFinal = $precioPlato - ($precioPlato * $descuentoCupon);
                
                Domicilio::create(array_merge($request->all(), ['cupon_id' => $cuponId],['precio' => $precioFinal]));
                return redirect()->route('ListaPedidos')->with('success','Pedido Creado');
            }
            
        } catch (QueryException $ex) {
            return redirect()->route('createD')->with('danger','Cupon error');

        }

        
    }

    public function createD(){

        
        $platos = Plato::where('status','1')->get();

        return view('pedido',compact('platos'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateD(PedidoRequest $request, Domicilio $pedidos)
    {

        try {
            $cupon = Cupon::where('codigo_cupon',$request->cupon_id)->first();
    
            
    
            if(!$cupon){
                return redirect()->route('createD')->with('danger','Cupon No Existe');
                
            }else{
                
                $cuponId = $cupon ? $cupon->id : null;
                $plato = Plato::find($request->plato_id);
                $precioPlato = $plato->precio;
                $descuentoCupon = $cupon->porcentaje / 100;
                $precioFinal = $precioPlato - ($precioPlato * $descuentoCupon);
                
                $pedidos->update(array_merge($request->all(), ['cupon_id' => $cuponId],['precio' => $precioFinal]));
                return redirect()->route('ListaPedidos')->with('success','Pedido Actualizado');
            }
            
        } catch (QueryException $ex) {
            return redirect()->route('ListaPedidos')->with('danger','Cupon error');

        }
        
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
        
        return redirect()->route('ListaPedidos')->with('danger','Pedido Eliminada');
    }
}
