@extends('layouts.landing')

@section('title','Lista')

@section('conten')
    <div>
        <button type="submit" class="text-center form-btn form-btn"><a href="{{route('createD')}}">Crear</a></button> 
    </div>

    <div class="background_content">
        <h1>Lista Pedidos</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Telefono</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Tipo Pedido</th>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">hora</th>
                    <th class="text-center">Cupon</th>
                    <th class="text-center">Ver</th>
                    <th class="text-center">Modificar Estado</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($pedidos as $pedidos)

                        <tr>
                            <td>{{$pedidos->nombre}}</td>
                            <td>{{$pedidos->telefono}}</td>
                            <td>{{$pedidos->precio}}</td>
                            <td>{{$pedidos->tipo_pedido}}</td>
                            <td>{{$pedidos->descripcion}}</td>
                            <td>{{$pedidos->hora}}</td>
                            <td>{{$pedidos->cupon->codigo_cupon}}</td>
                            <td>
                                <button type="submit" class="text-center btn btn-success"><a class="" href="{{route('editD',$pedidos->id)}}">Editar</a></button> 
                            </td>
                            <td>
                                <form method="POST" action="{{route('destroyD',$pedidos->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    @if($pedidos->status == 1)
                                        <button type="submit" class="text-center btn btn-danger">Eliminar</button>  
                                    @else
                                        <button type="submit" class="text-center btn btn-success">Activar</button>  
                                    @endif
                                    
                                </form>
                            </td>
                        </tr>

                        
                    @empty
                        <tr>
                            <td>No</td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
        </div>

    </div>

@endsection