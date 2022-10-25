<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>

    <h2>Hola el paciente {{ $paciente }}, ha reservado un turno para el {{ $fecha_turno}} a las {{ $hora_turno}}, </h2>
    <p>Por favor en cuanto sea posible confirme la reserva o cancele.</p>
    <p>Para ingresar  al sistema haga clic en el siguiente link:</p>

    <a href="{{ url('/appointments' ) }}">
        Mis Turnos
    </a>
</body>
</html>