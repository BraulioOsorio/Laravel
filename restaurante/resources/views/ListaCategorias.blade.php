@extends('layouts.landing')

@section('title','Lista')

@section('conten')
    <div>
        <button type="submit" class="text-center form-btn form-btn"><a href="{{route('create')}}">Crear</a></button> 
    </div>

    <div class="background_content" style="background-color:black">
        <h1>Lista Categoria</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($categorias as $cate)

                        <tr>
                            <td>{{$cate->nombre}}</td>
                            <td>{{$cate->descripcion}}</td>
                            <td>
                                <button type="submit" class="text-center btn-success"><a href="{{route('edit',$cate->id)}}">Editar</a></button> 
                            </td>
                            <td>
                                <form method="POST" action="{{route('destroy',$cate->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-center btn-danger">Eliminar</button> 
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