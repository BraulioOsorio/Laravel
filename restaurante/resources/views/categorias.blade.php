@extends('layouts.landing')

@section('title','Categorias')

@section('conten')

    <div class="background_content" style="background-color:black">
        <h1>Categorias</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <form action="{{route('store')}}" method="post">
                @csrf
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','text')
                                @slot('name','nombre')
                                @slot('place','Nombre-categoria')
                            @endcomponent
                        </div>

                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','text')
                                @slot('name','descripcion')
                                @slot('place','Descripcion')
                                
                            @endcomponent
                        </div>
                        <div>
                            <button type="submit" class="text-center form-btn form-btn">Guardar</button> 
                        </div>
                    </div>
                </div>
                
                <div class="clear"></div>
            </form>
        </div>

    </div>

@endsection