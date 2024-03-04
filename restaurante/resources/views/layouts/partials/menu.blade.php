<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Restaurante</a>
        </div>
        <div>
            <ul class="nav navbar-nav clear main-nav navbar-right ">
                <li><a class="navactive color_animation" href="{{--route()--}}">Inicio</a></li>
                <li><a class="navactive color_animation" href="{{route('ListaCategorias')}}">Categorias</a></li>
                <li><a class="navactive color_animation" href="{{route('plato')}}">Plato</a></li>
                <li><a class="navactive color_animation" href="{{route('pedido')}}">Pedido</a></li>
                <li><a class="navactive color_animation" href="{{route('ListaUsuarios')}}">Usuarios</a></li>
            </ul>
        </div>
    </div>
</nav>