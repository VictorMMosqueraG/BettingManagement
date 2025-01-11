<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e3f2fd;
        }

        /* Contenedor principal con gradiente */
        .menu-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(to right, #4CAF50, #2e7d32);
            color: white;
            padding: 20px;
        }

        /* Título principal */
        .menu-container h1 {
            font-size: 3rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Subtítulo */
        .menu-container p {
            font-size: 1.2rem;
            margin-bottom: 50px;
            text-align: center;
            max-width: 400px;
        }

        /* Contenedor del menú */
        .menu {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0;
        }

        /* Opciones del menú */
        .menu li {
            margin: 15px 0;
            width: 100%;
            text-align: center;
        }

        /* Estilo de los botones del menú */
        .menu li a {
            padding: 20px 40px;
            background-color: #ffffff;
            color: #4CAF50;
            text-decoration: none;
            font-size: 1.25rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin: 10px;
            width: 250px; /* Establecer un ancho fijo */
        }

        /* Efecto hover de los enlaces */
        .menu li a:hover {
            background-color: #4CAF50;
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        /* Efecto active del enlace */
        .menu li a:active {
            transform: translateY(2px);
        }

        /* Estilo para los iconos */
        .menu li a i {
            margin-right: 10px;
        }

        /* Opcional: Sección para personalizar aún más las clases de las opciones */
        .menu .users-link a {
            background-color: #ffeb3b;
            color: #2c6d14;
        }

        .menu .events-link a {
            background-color: #f44336;
            color: #fff;
        }

        .menu .bets-link a {
            background-color: #2196f3;
            color: #fff;
        }

    </style>
</head>
<body>

    <!-- Contenedor para el menú -->
    <div class="menu-container">
        <h1>Bienvenido a la aplicación</h1>
        <p>Selecciona una opción para continuar:</p>

        <!-- Menú con clases personalizadas para cada opción -->
        <ul class="menu">
            <li class="users-link">
                <a href="{{ route('users.create') }}"><i class="fas fa-user-plus"></i> Registrar Usuario</a>
            </li>
            <li class="events-link">
                <a href="{{ route('sportsevents.create') }}"><i class="fas fa-calendar-plus"></i> Crear Evento</a>
            </li>
            <li class="bets-link">
                <a href="{{ route('bets.create') }}"><i class="fas fa-basketball-ball"></i> Crear Apuesta</a>
            </li>
        </ul>
    </div>

    <!-- Incluyendo los iconos -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
