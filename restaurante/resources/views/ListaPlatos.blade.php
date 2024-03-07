@extends('layouts.landing')

@section('title','Lista')

@section('conten')
    <div>
        <button type="submit" class="text-center form-btn form-btn"><a href="{{route('createP')}}">Crear</a></button> 
    </div>

    <div class="background_content" style="background-color:black">
        <h1>Lista Platos</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Costo</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Modificar Estado</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($platos as $platos)

                        <tr>
                            <td>{{$platos->nombre}}</td>
                            <td>{{$platos->precio}}</td>
                            <td>{{$platos->costo}}</td>
                            <td>
                                <button type="submit" class="text-center btn btn-success"><a class="" href="{{route('editP',$platos->id)}}">Editar</a></button> 
                            </td>
                            <td>
                                <form method="POST" action="{{route('destroyP',$platos->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    @if($platos->status == 1)
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