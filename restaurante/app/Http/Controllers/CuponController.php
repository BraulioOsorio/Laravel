<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupon;

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
    public function storeC(Request $request)
    {
        Cupon::create($request->all());
        return redirect()->route('ListaCupones');
    }

    public function createC(){
        return view('cupon');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateC(Request $request, Cupon $cupon)
    {
        $cupon->update($request->all());
        return redirect()->route('ListaCupones');
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
        
        return redirect()->route('ListaCupones');
    }
}
