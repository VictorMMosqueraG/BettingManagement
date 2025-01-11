<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Estilo para el contenedor principal */
        .menu-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 50px;
        }

        .menu-container h1 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        /* Estilo del menú */
        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .menu li {
            margin: 10px;
        }

        .menu li a {
            display: inline-block;
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .menu li a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <!-- Contenedor del Menú -->
    <div class="menu-container">
        <h1>Bienvenido a la aplicación</h1>
        <p>Utiliza el menú para registrar usuarios, crear eventos deportivos y más.</p>

        <!-- Menú de Opciones -->
        <ul class="menu">
            <li><a href="{{ route('users.create') }}">Registrar Usuario</a></li>
            <li><a href="{{ route('users.edit', 1) }}">Actualizar Usuario</a></li>
            <li><a href="{{ route('sportsevents.create') }}">Crear Evento</a></li>
            <li><a href="{{ route('sportsevents.index') }}">Ver Eventos</a></li>
        </ul>
    </div>

</body>
</html>
