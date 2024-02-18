<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campañas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Campañas</h1>

    <p>Fecha: <span id="fecha"><?php $time = time();
        echo date("d-m-Y", $time); ?></span></p>
    <p>Nombre de la Empresa: <span>Chocovistas</span></p>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Extensiones</th>
                <th>Dirección</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($campanias as $campania)
                <tr>
                    <td>
                        <p>{{$campania->nombre}}</p>
                    </td>
                    <td>
                        <p>{{$campania->descripcion}}</p>
                    </td>
                    <td>
                        <p>{{$campania->extensiones}}</p>
                    </td>
                    <td>
                        <p>{{$campania->direccion}}</p>
                    </td>   
                    <td>
                        <p>{{$campania->estado}}</p>
                    </td>
                </tr>
           @endforeach
        </tbody>
    </table>
</body>
</html>
