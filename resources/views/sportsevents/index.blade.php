<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Eventos</title>
    <link rel="stylesheet" href="{{ asset('css/indexEvent.css') }}">
</head>
<body>

    <div class="container">
        <h1>Eventos Deportivos</h1>

        <!-- Botón para crear un nuevo evento -->
        <a href="{{ route('sportsevents.create') }}" class="btn">Crear Nuevo Evento</a>

        <!-- Tabla para mostrar los eventos -->
        <table>
            <thead>
                <tr>
                    <th>Nombre del Evento</th>
                    <th>Fecha</th>
                    <th>Deporte</th>
                    <th>Apuestas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y H:i') }}</td>
                        <td>{{ $event->sport_type }}</td>
                        <td>{{ $event->bets_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
