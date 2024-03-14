@extends('layouts.landing')

@section('title','Categorias')

@section('conten')

    <div class="background_content">
        <h1>Cupones</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form ">
            <form action="{{ isset($cupon) ? route('updateC',$cupon->id) : route('storeC') }}" method="post">
                @csrf
                @if(isset($cupon))
                    @method('put')
                @endif
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','text')
                                @slot('name','codigo_cupon')
                                @slot('place','Codigo-Cupon')
                                @if(isset($cupon))
                                    @slot('valor', $cupon->codigo_cupon)
                                @else
                                    @slot('valor', '')
                                @endif
                            @endcomponent
                            @error('codigo_cupon')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                        </div>
            
                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','number')
                                @slot('name','porcentaje')
                                @slot('place','Porcentaje-%')
                                @if(isset($cupon))
                                    @slot('valor', $cupon->porcentaje)
                                @else
                                    @slot('valor', '')
                                @endif
                            @endcomponent
                            @error('porcentaje')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="text-center form-btn form-btn">Guardar</button> 
                        </div>
                    </div>
                </div>
            </form>
            
        </div>

    </div>

@endsection