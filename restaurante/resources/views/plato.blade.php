@extends('layouts.landing')

@section('title','Plato')



  @section('conten')

    <div class="background_content">
        <h1>Platos</h1>
    </div>
    <div class="text-content container"> 
        <div class="contact-form">
            <form action="{{ isset($platos) ? route('updateP',$platos->id) : route('storeP') }}" method="post">
                <div class="container">
                    <div class="row">
                        @csrf
                        @if(isset($platos))
                            @method('put')
                        @endif

                        <div class="col-lg-6 col-md-6 col-xs-6">
                            @component('_components.inpout')
                                @slot('type','text')
                                @slot('name','nombre')
                                @slot('place','Nombre-Plato')
                                @if(isset($platos))
                                    @slot('valor', $platos->nombre)
                                @else
                                    @slot('valor', '')
                                @endif
                                
                            @endcomponent
                            @error('nombre')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                            
                            <select class="form mb-5" aria-label="Default select example" name="categoria_id">

                                @forelse($categorias as $cate)
                                    @if(isset($platos))
                                        @if($platos->categoria_id == $cate->id)
                                            <option selected value={{$cate->id}}>{{$cate->nombre}}</option>
                                        @else
                                            <option value={{$cate->id}}>{{$cate->nombre}}</option>
                                        @endif
                    
                                    @else
                                        <option value={{$cate->id}}>{{$cate->nombre}}</option>
                                    @endif
                                @empty
                                    <option>No Hay categorias</option>
                                @endforelse
                            </select>
                            
                        </div>

                        <div class="col-lg-6 col-md-6 col-xs-6">
                            
                            @component('_components.inpout')
                              @slot('type','number')
                              @slot('name','costo')
                              @slot('place','Costo-Plato')
                              @if(isset($platos))
                                    @slot('valor', $platos->costo)
                                @else
                                    @slot('valor', '')
                                @endif
                                
                            @endcomponent
                            @error('costo')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                            @component('_components.inpout')
                                @slot('type','number')
                                @slot('name','precio')
                                @slot('place','Precio-Plato')
                                @if(isset($platos))
                                    @slot('valor', $platos->precio)
                                @else
                                    @slot('valor', '')
                                @endif
                            @endcomponent
                            @error('precio')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                            
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