<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>{{$user->name}} Phone</h1>
    <ul>
        @forelse($user->roles as $role)
        
        <li>{{$role->name}} {{$role->pivot->added_by}}</li>
        @empty
            
        @endforelse
        
    </ul>





    {{-- <h1>{{$user->name}} Phone</h1>
    <ul>
        @forelse($user->phones as $user)
        
        <li>{{$user->prefix}} {{$user->phone_number}}</li>
        @empty
            
        @endforelse
        
    </ul> --}}
    
    {{-- <h1>Prefijo:{{$user->phone->prefix}}</h1>
    <h1>Numero:{{$user->phone->phone_number}}</h1> --}}
</body>
</html>