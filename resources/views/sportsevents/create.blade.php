<!-- resources/views/sportsevents/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Evento Deportivo</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div style="text-align: center; padding: 50px;">
        <h1>Crear un Nuevo Evento Deportivo</h1>

        <!-- Si hay errores de validación, los mostramos aquí -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para crear un nuevo evento -->
        <form action="{{ route('sportsevents.store') }}" method="POST">
            @csrf <!-- Se necesita para proteger contra ataques CSRF -->

            <div>
                <label for="name">Nombre del Evento:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="event_date">Fecha del Evento:</label>
                <input type="date" id="event_date" name="event_date" value="{{ old('event_date') }}" required>
            </div>

            <div>
                <label for="sport_type">Tipo de Deporte:</label>
                <input type="text" id="sport_type" name="sport_type" value="{{ old('sport_type') }}" required>
            </div>

            <div>
                <button type="submit">Crear Evento</button>
            </div>
        </form>
    </div>

</body>
</html>
