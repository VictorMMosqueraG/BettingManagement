<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>
<body>
    <!-- Contenedor para el menú -->
    <div class="menu-container">
        <h1>Bienvenido a la aplicación</h1>
        <p>Selecciona una opción para continuar:</p>

        <ul class="menu">
            <li class="users-link">
                <a href="{{ route('users.create') }}"><i class="fas fa-user-plus"></i> Registrar Usuario</a>
            </li>
            <li class="events-link">
                <a href="{{ route('sportsevents.create') }}"><i class="fas fa-calendar-plus"></i> Crear Evento</a>
            </li>
            <li class="events-link">
                <a href="{{ route('sportsevents.index') }}"><i class="fas fa-calendar-plus"></i> Ver Evento</a>
            </li>
            <li class="bets-link">
                <a href="{{ route('bets.create') }}"><i class="fas fa-basketball-ball"></i> Crear Apuesta</a>
            </li>
            <li class="view-bets-link">
                <a href="{{ route('selectUser') }}"><i class="fas fa-eye"></i> Ver Apuestas</a>
            </li>
        </ul>
    </div>

</body>
</html>
