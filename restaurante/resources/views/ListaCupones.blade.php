@extends('layouts.landing')

@section('title','Lista')

@section('conten')
    <div>
        <button type="submit" class="text-center form-btn form-btn"><a href="{{route('createC')}}">Crear</a></button> 
    </div>

    <div class="background_content" style="background-color:black">
        <h1>Lista Cupones</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <table class="table ">
                <thead>
                  <tr >
                    <th class="text-center">Codigo</th>
                    <th class="text-center">Porcentaje</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Modificar Estado</th>
                  </tr>
                </thead>
                    <tbody class="text-center">
                    @forelse ($cupones as $cu)

                        <tr>
                            <td>{{$cu->codigo_cupon}}</td>
                            <td>{{$cu->porcentaje}}</td>
                            <td>
                                <button type="submit" class="text-center btn btn-success"><a href="{{route('editC',$cu->id)}}">Editar</a></button> 
                            </td>
                            <td>
                                <form method="POST" action="{{route('destroyC',$cu->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    @if($cu->status == 1)
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