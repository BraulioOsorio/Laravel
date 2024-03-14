@extends('layouts.landing')

@section('title','Lista')

@section('conten')
    <div>
        <button type="submit" class="text-center form-btn form-btn"><a href="{{route('create')}}">Crear</a></button> 
    </div>

    <div class="background_content">
        <h1>Lista Categoria</h1>
    </div>
    <div class="text-content container"> 
        
        <div class="contact-form">
            <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Modificar Estado</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($categorias as $cate)

                        <tr>
                            <td>{{$cate->nombre}}</td>
                            <td>{{$cate->descripcion}}</td>
                            <td>
                                <button type="submit" class="text-center btn btn-success"><a href="{{route('edit',$cate->id)}}">Editar</a></button> 
                            </td>
                            <td>
                                <form method="POST" action="{{route('destroy',$cate->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    @if($cate->status == 1)
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