<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apuestas de {{ $user->name }}</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #4CAF50;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .no-bets {
            text-align: center;
            font-size: 1.5rem;
            margin-top: 20px;
            color: #4CAF50;
        }
    </style>
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
