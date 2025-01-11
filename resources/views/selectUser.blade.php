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
            <h1>Seleccionar Usuario</h1>

            <!-- Formulario para seleccionar usuario -->
            <form id="userForm" method="GET">
                <div class="select-container">
                    <label for="user_id">Selecciona un usuario:</label>
                    <select name="user_id" id="user_id" required>
                        <option value="">Seleccione...</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit">Ver Apuestas</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/selectUser.js') }}"></script>

</body>
</html>
