<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupon;
use App\Http\Requests\CuponRequest;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListaCupones()
    {
        $cupones = Cupon::all();
        //$platos = Platos::where('status','1')->get();
        return view('ListaCupones',compact('cupones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeC(CuponRequest $request)
    {
        Cupon::create($request->all());
        return redirect()->route('ListaCupones')->with('success','Cupon Creado');
    }

    public function createC(){
        return view('cupon');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateC(CuponRequest $request, Cupon $cupon)
    {
        $cupon->update($request->all());
        return redirect()->route('ListaCupones')->with('success','Cupon Actualizado');
    }


    public function editC(Cupon $cupon){
        return view('cupon',compact('cupon'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyC(Request $request, $cupon)

    {
        $cuponFind = Cupon::find($cupon);

        if($cuponFind){
            $cuponFind->status= ($cuponFind->status==1)? 0 : 1;
            $cuponFind->save();

        }
        
        return redirect()->route('ListaCupones')->with('danger','Cupon Eliminada');
    }
}
