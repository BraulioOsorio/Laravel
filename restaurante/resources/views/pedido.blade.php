@extends('layouts.landing')

@section('title','Plato')

@section('conten')

    <div class="background_content">
        <h1>Plato</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <form id="contact-us" method="post">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','text')
                                @slot('name','nombre')
                                @slot('place','Nombre-Completo')
                            @endcomponent
                            @component('_components.inpout')
                                @slot('type','number')
                                @slot('name','telefono')
                                @slot('place','Telefono')
                            @endcomponent
                            @component('_components.inpout')
                                @slot('type','text')
                                @slot('name','direccion')
                                @slot('place','Direccion')
                            @endcomponent
                            <input type="text" name="cupon" class="form" placeholder="Cupon" />
                            <select class="form " aria-label="Default select example">
                                <option selected>Seleccione un Plato</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-xs-6">
                            <textarea name="descripcion" class="form textarea"  placeholder="Descripción"></textarea>
                            @component('_components.inpout')
                                @slot('type','time')
                                @slot('name','hora')
                                @slot('place','Hora')
                            @endcomponent
                            <select class="form" aria-label="Default select example">
                                <option selected>Seleccione el Tipo de pedido</option>
                                <option value="1">ENSITIO</option>
                                <option value="2">DOMICILIO</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" id="submit" name="submit" class="text-center form-btn form-btn">Guardar</button> 
                        </div>
                    </div>
                </div>
                
                <div class="clear"></div>
            </form>
        </div>

    </div>

@endsection