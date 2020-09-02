<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <h4>Lista de precios de juegos en el mercado</h4>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col"><strong>Juego</strong></th>
                <th scope="col"><strong>Precio PC</strong></th>
                <th scope="col"><strong>Precio XBOX</strong></th>
                <th scope="col"><strong>Precio Play Station</strong></th>
            </tr>
        </thead>
        <tbody>
            @forelse($juegos as $juego)
            <tr>
                <th scope="row">{{ $juego->id_juego }}</th>
                <td>{{ $juego->juego }}</td>
                <td>{{ $juego->precio_pc }}</td>
                <td>{{ $juego->precio_xbox }}</td>
                <td>{{ $juego->precio_ps }}</td>
            </tr>
            @empty
            <tr>
                <th scope="row">No hay juegos</th>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>