@extends('layouts.landingI')

@section('title','Pedidos')

@section('conten')

    <div class="background_content">
        <h1>Pedidos</h1>
    </div>
    <div class="text-center">
        
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <form id="contact-us" method="post" action="{{isset($pedidos) ? route('updateD',$pedidos->id) : route('storeD')}}">
                
                <div class="container">
                    <div class="row">
                        @csrf
                        @if(isset($pedidos))
                            @method('put')
                        @endif

                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','text')
                                @slot('name','nombre')
                                @slot('place','Nombre-Completo')
                                @if(isset($pedidos))
                                    @slot('valor', $pedidos->nombre)
                                @else
                                    @slot('valor', '')
                                @endif
                            @endcomponent
                            @error('nombre')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                            @component('_components.inpout')
                                @slot('type','number')
                                @slot('name','telefono')
                                @slot('place','Telefono')
                                @if(isset($pedidos))
                                    @slot('valor', $pedidos->telefono)
                                @else
                                    @slot('valor', '')
                                @endif
                            @endcomponent
                            @error('telefono')
                                <p style="color:red">{{$message}}</p>
                            @enderror

                            @component('_components.inpout')
                                @slot('type','text')
                                @slot('name','direccion')
                                @slot('place','Direccion')
                                @if(isset($pedidos))
                                    @slot('valor', $pedidos->direccion)
                                @else
                                    @slot('valor', '')
                                @endif
                            @endcomponent
                            @error('direccion')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                           
                            @if(!isset($pedidos))
                                <input type="text" name="cupon_id" class="form" placeholder="Cupon" />
                            @endif

                            <input type="hidden" name="validar" value="1" class="form" />
                            @if(isset($pedidos))
                                <a class="navbar-brand">Total a pagar: {{$pedidos->precio}}</a>
                            @endif
                            
                            
                        </div>

                        <div class="col-lg-6 col-md-6 col-xs-6">
                            
                            @if(isset($pedidos))
                                <textarea name="descripcion" class="form textarea"  placeholder="Descripción" value="{{$pedidos->descripcion}}">{{$pedidos->descripcion}}</textarea>
                            @else
                                <textarea name="descripcion" class="form textarea"  placeholder="Descripción"></textarea>
                            @endif
                            @error('descripcion')
                                <p style="color:red">{{$message}}</p>
                            @enderror

                            @component('_components.inpout')
                                @slot('type','time')
                                @slot('name','hora')
                                @slot('place','Hora')
                                @if(isset($pedidos))
                                    @slot('valor', $pedidos->hora)
                                @else
                                    @slot('valor', '')
                                @endif
                            @endcomponent
                            @error('hora')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                            <select name="tipo_pedido" class="form" aria-label="Default select example">
                                @if(isset($pedidos))
                                    @if($pedidos->tipo_pedido == "ENSITIO")
                                        <option selected value="ENSITIO">ENSITIO</option>
                                        <option value="DOMICILIO">DOMICILIO</option>
                                    @else
                                        <option selected value="DOMICILIO">DOMICILIO</option>
                                        <option value="ENSITIO">ENSITIO</option>
                                    @endif

                                @else
                                    <option value="ENSITIO">ENSITIO</option>
                                    <option value="DOMICILIO">DOMICILIO</option>
                                @endif
                                
                            </select>
                            
                        </div>
                        
                    </div>
                    @if(!isset($pedidos))
                        <div class="">
                            <h3 class="text-center">Platos</h3>
                            <div class="">
                                <div class="row">
                                    @foreach($platos as $plato)
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <div class="form-check form">
                                            <input class="form-check-input" type="checkbox" value="{{ $plato->id }}" id="plato{{ $plato->id }}" name="platos[]">
                                            <label class="form-check-label" for="plato{{ $plato->id }}">
                                                Plato: {{ $plato->nombre }}
                                            </label>
                                            <br>
                                            <label class="form-check-label" style="margin-left: 15px" for="plato{{ $plato->id }}">
                                                Precio: {{ $plato->precio }}
                                            </label>
                                        </div>

                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div>
                        <button type="submit" id="submit" name="submit" class="text-center form-btn form-btn">Guardar</button> 
                    </div>
                </div>
                
                <div class="clear"></div>
            </form>
            @if(isset($pedidos))

                <form method="POST" action="{{route('destroyD',$pedidos->id)}}" class="text-center">
                    @csrf
                    @method('DELETE')
                    
                    
                    <input type="hidden" name="validar" value="1" class="form"/>
                    <button type="submit" class="text-center btn btn-danger" style=" margin-left: 30px;margin-top: 10px; padding-left: 65px; padding-top:15px; padding-bottom:15px;padding-right:65px; " > Eliminar</button>  

                    
                </form>
            @endif
        </div>

    </div>

@endsection