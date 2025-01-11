<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apuestas de {{ $user->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/indexBet.css') }}">
</head>
<body>

<h1>Apuestas de {{ $user->name }}</h1>
    @if($bets->isEmpty())
        <p>No hay apuestas para este usuario.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Evento</th>
                    <th>Monto</th>
                    <th>Cuota</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bets as $bet)
                    <tr>
                        <td>{{ $bet->id }}</td>
                        <td>{{ $bet->event_name }}</td>
                        <td>{{ $bet->amount }}</td>
                        <td>{{ $bet->odds }}</td>
                        <td>{{ $bet->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>
