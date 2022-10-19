<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>

    <h2>Hola {{ $paciente }}, se ha reservado un turno para el {{ $fecha_turno}} a las {{ $hora_turno}}, con el doctor: <strong>{{{$doctor}}}</strong> !</h2>
    <p>En breve recibirá la confirmación del mismo.</p>
    <p>Si desea ingresar nuevamente al sistema haga clic en el siguiente link:</p>

    <a href="{{ url('/home' ) }}">
        Reingresar al Sistema
    </a>
</body>
</html>