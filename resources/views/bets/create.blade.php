<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Apuesta</title>
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
</head>
<body>

    <h1>Crear Apuesta</h1>

    <form action="{{ route('bets.store') }}" method="POST">
        @csrf

        <div>
            <label for="user_id">Usuario:</label>
            <select id="user_id" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} (Saldo: {{ $user->balance }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="event_id">Evento Deportivo:</label>
            <select id="event_id" name="event_id" required>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }} - {{ $event->event_date }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="amount">Monto:</label>
            <input type="number" id="amount" name="amount" required>
        </div>

        <div>
            <label for="odds">Probabilidad:</label>
            <input type="number" id="odds" name="odds" required>
        </div>

        <button type="submit">Crear Apuesta</button>
    </form>

</body>
</html>
