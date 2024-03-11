<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Corta descripción</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Precio</th>
              </tr>
        </thead>

        <tbody class="text-center">
            @forelse($product as $pro)
            <tr>
                <td>{{$pro->name}}</td>
                <td>{{$pro->short_description}}</td>
                <td>{{$pro->description}}</td>
                <td>{{$pro->price}}</td>
            </tr>
            @empty
                <td>nonas</td>
            @endforelse
        </tbody>
    </table>
</body>
</html>