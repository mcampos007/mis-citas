<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>

    <h2>Hola {{ $paciente }}, se ha cancelado el turno para el {{ $fecha_turno}} a las {{ $hora_turno}}, con el doctor: <strong>{{{$doctor}}}</strong> !</h2>
    <p>Si lo desea, puede solicitar uno nuevo.</p>
    <p>Para ingresar nuevamente al sistema haga clic en el siguiente link:</p>

    <a href="{{ url('/home' ) }}">
        Ingresar al Sistema
    </a>
</body>
</html>