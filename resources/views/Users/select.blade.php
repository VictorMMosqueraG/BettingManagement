<!-- resources/views/Users/select.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/SelectUser.css') }}">
</head>
<body>

    <div class="container">
        <div class="content">
            <h1>Seleccionar Usuario para Actualizar</h1>

            <!-- Formulario para seleccionar usuario -->
            <form method="GET" action="{{ route('users.edit', 'id_placeholder') }}" id="userForm">
                <div class="select-container">
                    <label for="user_id">Selecciona un usuario:</label>
                    <select name="user_id" id="user_id" required>
                        <option value="">Seleccione...</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit">Actualizar Usuario</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/updateUser.js') }}"></script>

</body>
</html>
