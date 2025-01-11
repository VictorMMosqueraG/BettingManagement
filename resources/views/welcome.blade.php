<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Barra de Navegación -->
    <nav style="background-color: #4CAF50; padding: 10px;">
        <ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden;">
            <li style="float: left; margin-right: 20px;">
                <a href="{{ route('users.create') }}" style="color: white; text-decoration: none; font-size: 18px;">Registrar Usuario</a>
            </li>
        </ul>
    </nav>

    <div style="text-align: center; padding: 50px;">
        <h1>Bienvenido a la aplicación</h1>
        <p>Utiliza el menú de navegación para registrar usuarios y realizar otras acciones.</p>
    </div>

</body>
</html>
