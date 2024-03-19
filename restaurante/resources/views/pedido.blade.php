@extends('layouts.landing')

@section('title','Pedidos')

@section('conten')

    <div class="background_content">
        <h1>Pedidos</h1>
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
                           
                            @if(isset($pedidos))
                                <input type="text" name="cupon_id" class="form" placeholder="Cupon" value="{{$pedidos->cupon->codigo_cupon}}"/>
                            @else
                                <input type="text" name="cupon_id" class="form" placeholder="Cupon" />
                            @endif
                            <select class="form " aria-label="Default select example" name="plato_id">
                                @forelse($platos as $platos)
                                    @if(isset($pedidos))
                                        @if($pedidos->plato_id == $platos->id)
                                            <option selected value={{$platos->id}}>{{$platos->nombre}}</option>
                                        @else
                                            <option value={{$platos->id}}>{{$platos->nombre}}</option>
                                        @endif
                                    @else
                                        <option value={{$platos->id}}>{{$platos->nombre}}</option>
                                    @endif
                                @empty
                                    
                                    <option value="0">No Hay Platos</option>
                                @endforelse
                            </select>
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
                        <div>
                            <button type="submit" id="submit" name="submit" class="text-center form-btn form-btn">Guardar</button> 
                        </div>
                    </div>
                </div>
                
                <div class="clear"></div>
            </form>
        </div>

    </div>

@endsection