<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="ruta/a/tu/font-awesome/css/all.min.css" />

    <title>Document</title>
    <style>

        @charset "UTF-8";
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

        body {
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
            line-height: 1.42em;
            color: #A7A1AE;
            background-color: #1F2739;
        }

        h1 {
            font-size: 3em;
            font-weight: 300;
            line-height: 1em;
            text-align: center;
            color: #4DC3FA;
        }

        h2 {
            font-size: 1em;
            font-weight: 300;
            text-align: center;
            display: block;
            line-height: 1em;
            padding-bottom: 2em;
            color: #FB667A;
        }

        h2 a {
            font-weight: 700;
            text-transform: uppercase;
            color: #FB667A;
            text-decoration: none;
        }

        .blue {
            color: #185875;
        }

        .yellow {
            color: #FFF842;
        }

        .container th h1 {
            font-weight: bold;
            font-size: 1em;
            text-align: left;
            color: #185875;
        }

        .container td {
            font-weight: normal;
            font-size: 1em;
            -webkit-box-shadow: 0 2px 2px -2px #0E1119;
            -moz-box-shadow: 0 2px 2px -2px #0E1119;
            box-shadow: 0 2px 2px -2px #0E1119;
        }

        .container {
            text-align: left;
            overflow: hidden;
            width: 80%;
            margin: 0 auto;
            display: table;
            padding: 0 0 8em 0;
        }

        .container td,
        .container th {
            padding-bottom: 2%;
            padding-top: 2%;
            padding-left: 2%;
        }

        /* Background-color of the odd rows */
        .container tr:nth-child(odd) {
            background-color: #323C50;
        }

        /* Background-color of the even rows */
        .container tr:nth-child(even) {
            background-color: #2C3446;
        }

        .container th {
            background-color: #1F2739;
        }

        .container td:first-child {
            color: #FB667A;
        }

        .container tr:hover {
            background-color: #464A52;
            -webkit-box-shadow: 0 6px 6px -6px #0E1119;
            -moz-box-shadow: 0 6px 6px -6px #0E1119;
            box-shadow: 0 6px 6px -6px #0E1119;
        }

        

        @media (max-width: 800px) {

            .container td:nth-child(4),
            .container th:nth-child(4) {
                display: none;
            }
        }
    </style>
</head>

<body>
    @extends('insert')
    @section('content')
    <table class="container">
        <thead>
            <tr>
                <th>
                    <h1>id</h1>
                </th>
                <th>
                    <h1>Nombre</h1>
                </th>
                <th>
                    <h1>Categoria</h1>
                </th>
                <th>
                    <h1>Proveedor</h1>
                </th>
                <th>
                    <h1>Lente</h1>
                </th>
                <th>
                    <h1>Resolucion</h1>
                </th>
                <th>
                    <h1>Peso</h1>
                </th>
                <th>
                    <h1>Precio</h1>
                </th>
                <th>
                    <h1>Actualizar</h1>
                </th>
                <th>
                    <h1>Eliminar</h1>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($camaras as $camara)
                <tr>
                    <td>{{ $camara->id }}</td>
                    <td>{{ $camara->nombre }}</td>
                    <td>{{ $camara->categoria }}</td>
                    <td>{{ $camara->proveedor }}</td>
                    <td>{{ $camara->tipo_de_lente }}</td>
                    <td>{{ $camara->resolucion }}</td>
                    <td>{{ $camara->peso }}</td>
                    <td>{{ $camara->precio }}</td>
                    <td>
                        <!-- Botón para actualizar -->
                        <a href="{{ route('camaras-update', ['id' => $camara->id]) }}"><button><i class="fas fa-pen-square"></i></button></a>
                    </td>
                    <td> <!-- Formulario para eliminar -->
                        <form action="{{ route('camaras-destroy', ['id' => $camara->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @endsection
</body>

</html>
