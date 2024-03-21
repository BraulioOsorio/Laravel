@extends('layouts.landing')

@section('title','Lista')

@section('conten')
    <div class="background_content">
        <h1>Platos Pedidos</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">Nombre Usuario</th>
                    <th class="text-center">Direccion Usuario</th>
                    <th class="text-center">Nombre Plato</th>
                    <th class="text-center">Precio Plato</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($platos as $platos)

                        <tr>
                            <td>{{$platos->pedido->nombre}}</td>
                            <td>{{$platos->pedido->direccion}}</td>
                            <td>{{$platos->plato->nombre}}</td>
                            <td>{{$platos->plato->precio}}</td>
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