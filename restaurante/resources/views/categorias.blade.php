@extends('layouts.landing')

@section('title','Categorias')

@section('conten')

    <div class="background_content">
        <h1>Categorias</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form ">
            <form action="{{ isset($categorias) ? route('update',$categorias->id) : route('store') }}" method="post">
                @csrf
                @if(isset($categorias))
                    @method('put')
                @endif
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','text')
                                @slot('name','nombre')
                                @slot('place','Nombre-categoria')
                                @if(isset($categorias))
                                    @slot('valor', $categorias->nombre)
                                @else
                                    @slot('valor', '')
                                @endif
                               
                            @endcomponent
                            @error('nombre')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                        </div>
            
                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','text')
                                @slot('name','descripcion')
                                @slot('place','Descripcion')
                                @if(isset($categorias))
                                    @slot('valor', $categorias->descripcion)
                                @else
                                    @slot('valor', '')
                                @endif
                                
                            @endcomponent
                            @error('descripcion')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="text-center form-btn form-btn">Guardar</button> 
                        </div>
                    </div>
                </div>
            </form>
            
        </div>

    </div>

@endsection