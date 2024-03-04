@extends('layouts.landing')

@section('title','Lista')

@section('conten')
    <div>
        <button type="submit" class="text-center form-btn form-btn"><a href="{{route('createU')}}">Crear</a></button> 
    </div>

    <div class="background_content" style="background-color:black">
        <h1>Lista Usuarios</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">correo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $user)

                        <tr>
                            <td>{{$user->Fullname}}</td>
                            <td>{{$user->correo}}</td>
                            <td>
                                <button type="submit" class="text-center btn-success"><a href="{{route('editU',$user->id)}}">Editar</a></button> 
                            </td>
                            <td>
                                <form method="POST" action="{{route('destroyU',$user->id)}}">
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