@extends('layouts.landing')

@section('title','Lista')

@section('conten')
    <div>
        <button type="submit" class="text-center form-btn form-btn"><a href="{{route('createU')}}">Crear</a></button> 
    </div>

    <div class="background_content" >
        <h1>Lista Usuarios</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <table class="table ">
                <thead>
                  <tr >
                    <th class="text-center">Nombre</th>
                    <th class="text-center">correo</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Modificar Estado</th>
                  </tr>
                </thead>
                    <tbody class="text-center">
                    @forelse ($usuarios as $user)

                        <tr>
                            <td>{{$user->Fullname}}</td>
                            <td>{{$user->correo}}</td>
                            <td>
                                <button type="submit" class="text-center btn btn-success"><a href="{{route('editU',$user->id)}}">Editar</a></button> 
                            </td>
                            <td>
                                <form method="POST" action="{{route('destroyU',$user->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    @if($user->status == 1)
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