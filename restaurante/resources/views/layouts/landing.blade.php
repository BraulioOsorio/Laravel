<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
        

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>

    <body style="background-color:black ">
        @include('layouts.partials.menu')
        @yield('conten')





        <script type="text/javascript" src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>     
        <script type="text/javascript" src="{{asset('assets/js/main.js')}}" ></script>

    </body>
</html>