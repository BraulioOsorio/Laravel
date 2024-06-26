<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
        

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>

    <body> 

 

        @yield('conten')

       
        
        <footer class="mt-5">
            @if(session('success'))
                <a class="navbar-brand">{{session('success')}}</a>
                

            @endif

            @if(session('danger'))
                    <a class="navbar-brand">{{session('danger')}}</a>
            @endif
        </footer>



        
        <script type="text/javascript" src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>     
        <script type="text/javascript" src="{{asset('assets/js/main.js')}}" ></script>

    </body>
</html>