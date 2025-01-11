<!-- resources/views/users/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
</head>
</head>
<body>

    <h1>Crear Nuevo Usuario</h1>

    <!-- Mostrar mensaje de éxito si está presente en la sesión -->
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- Si hay errores de validación, los mostramos aquí -->
    @if ($errors->any())
        <div class="error-list">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para crear un nuevo usuario -->
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="balance">Saldo:</label>
            <input type="number" id="balance" name="balance" value="{{ old('balance') }}" required>
        </div>

        <div>
            <button type="submit">Crear Usuario</button>
        </div>
    </form>

</body>
</html>
