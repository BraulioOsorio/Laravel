<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domicilio;
use App\Models\PedidoPlato;
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
    
    public function storeD(PedidoRequest $request)
    {
        try {
            $cupon = null;
            
            if(isset($request->cupon_id)){
                
                $cupon = Cupon::where('codigo_cupon', $request->cupon_id)->first();
                
                if (!$cupon) {
                    if(isset($request->validar)){
                        return redirect()->route('createDI')->with('success', 'Cupón No Existe');
        
                    }
                    return redirect()->route('createD')->with('danger', 'Cupón No Existe');
                }
                
            }
            
            $cuponId = $cupon ? $cupon->id : null;
            $platoIds = $request->input('platos', []);
            $precioTotal = 0; 
            
            $domicilio = Domicilio::create(array_merge($request->except(['_token', 'precio']), ['cupon_id' => $cuponId]));
            
            $domicilioId = $domicilio->id;
            
            if (!empty($platoIds)) {
                foreach ($platoIds as $platoId) {
                    $plato = Plato::find($platoId);
                    if ($plato) {
                        $precioTotal += $plato->precio;
                        PedidoPlato::create([
                            'plato_id' => $platoId,
                            'pedido_id' => $domicilioId, 
                        ]);
                    }
                }
                if(isset($request->cupon_id)){
                    $descuentoCupon = $cupon->porcentaje / 100;
                    $precioTotal -= ($precioTotal * $descuentoCupon);
                    
                }
                
                
            }else{
                return redirect()->route('createD')->with('danger', 'Debe seleccionar como minimo un Plato');
                
            }
            
            $domicilio->update(['precio' => $precioTotal]);

            
            if(isset($request->validar)){
                return redirect()->route('editDI', ['pedidos' => $domicilioId])->with('success', 'Pedido Creado');

            }
            return redirect()->route('ListaPedidos')->with('success', 'Pedido Creado');
        } catch (QueryException $ex) {
            if(isset($request->validar)){
                return redirect()->route('createDI')->with('success', 'Error');

            }
            return redirect()->route('createD')->with('danger', 'Error al crear el pedido');
        }
    }
    
    
    
    public function createD(){
        
        
        $platos = Plato::where('status','1')->get();
        
        return view('pedido',compact('platos'));
        
    }
    public function createDI(){
        
        
        $platos = Plato::where('status','1')->get();
        
        return view('pedidoI',compact('platos'));
        
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function updateD(PedidoRequest $request, Domicilio $pedidos)
    {
        
        try {
  
            $pedidos->update(array_merge($request->all()));
            if(isset($request->validar)){
                return redirect()->route('editDI', ['pedidos' => $pedidos])->with('success', 'Pedido Actualizado');
            }
            return redirect()->route('ListaPedidos')->with('success','Pedido Actualizado');
            
            
        } catch (QueryException $ex) {
            if(isset($request->validar)){
                return redirect()->route('createDI')->with('success', 'Error');

            }
            return redirect()->route('ListaPedidos')->with('danger','Cupon error');
            
        }
        
    }
    
    
    
    public function editD(Domicilio $pedidos){
        $platos = Plato::where('status','1')->get();
        return view('pedido',compact('pedidos','platos'));
    }

    public function editDI(Domicilio $pedidos){
        $platos = Plato::where('status','1')->get();
        return view('pedidoI',compact('pedidos','platos'));
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
        if(isset($request->validar)){
            return redirect()->route('createDI')->with('success', 'Pedido Eliminado');

        }
        
        return redirect()->route('ListaPedidos')->with('danger','Pedido Eliminada');
    }

    public function ListaPedidoPlatos(Domicilio $pedidos)
    {
        $platos = PedidoPlato::where('pedido_id', $pedidos->id)->get();
        return view('ListaPedidoPlatos',compact('platos'));
    }
}
