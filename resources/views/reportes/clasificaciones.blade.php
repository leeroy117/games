<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <h4>Clasificaciones </h4>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col"><strong>Nombre</strong></th>
            </tr>
        </thead>
        <tbody>
            @forelse($clasificaciones as $clasificacion)
            <tr>
                <th scope="row">{{ $clasificacion->id_clasificacion }}</th>
                <td>{{ $clasificacion->nombre}}</td>
            </tr>
            @empty
            <tr>
                <th scope="row">No hay clasificaciones</th>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>