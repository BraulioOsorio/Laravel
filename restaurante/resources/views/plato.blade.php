@extends('layouts.landing')

@section('title','Plato')



  @section('conten')

    <div class="background_content">
        <h1>Platos</h1>
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
                                @slot('place','Nombre-Plato')
                                
                            @endcomponent
                            
                            <select class="form mb-5" aria-label="Default select example">
                                <option selected>Seleccione una Categoria</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            
                        </div>

                        <div class="col-lg-6 col-md-6 col-xs-6">
                            
                            @component('_components.inpout')
                              @slot('type','number')
                              @slot('name','costo')
                              @slot('place','Costo-Plato')
                                
                            @endcomponent
                            @component('_components.inpout')
                                @slot('type','number')
                                @slot('name','precio')
                                @slot('place','Precio-Plato')
                            @endcomponent
                            
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