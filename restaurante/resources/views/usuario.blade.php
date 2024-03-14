@extends('layouts.landing')

@section('title','Categorias')

@section('conten')

    <div class="background_content">
        <h1>Categorias</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <form action="{{ isset($usuarios) ? route('updateU',$usuarios->id) : route('storeU') }}" method="post">
                @csrf
                @if(isset($usuarios))
                    @method('put')
                @endif
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','text')
                                @slot('name','Fullname')
                                @slot('place','Nombre-completo')
                                @if(isset($usuarios))
                                    @slot('valor', $usuarios->Fullname)
                                @else
                                    @slot('valor', '')
                                @endif
                            @endcomponent
                            @error('Fullname')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                        </div>
            
                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','mail')
                                @slot('name','correo')
                                @slot('place','Correo')
                                @if(isset($usuarios))
                                    @slot('valor', $usuarios->correo)
                                @else
                                    @slot('valor', '')
                                @endif
                            @endcomponent
                            @error('correo')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','password')
                                @slot('name','pass')
                                @slot('place','Contraseña')
                                @if(isset($usuarios))
                                    @slot('valor', $usuarios->pass)
                                @else
                                    @slot('valor', '')
                                @endif
                            @endcomponent
                            @error('pass')
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