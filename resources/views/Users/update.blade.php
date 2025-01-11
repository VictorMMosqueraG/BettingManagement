<!-- resources/views/users/update.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
</head>
<body>

    <h1>Actualizar Usuario</h1>

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

    <!-- Formulario para editar un usuario -->
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Especificamos que es una solicitud PUT para actualizar -->

        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div>
            <label for="balance">Saldo:</label>
            <input type="number" id="balance" name="balance" value="{{ old('balance', $user->balance) }}" required>
        </div>

        <div>
            <button type="submit">Actualizar Usuario</button>
        </div>
    </form>

</body>
</html>
