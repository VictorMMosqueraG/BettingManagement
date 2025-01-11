<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #4CAF50;
        }

        .content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-size: 1.75rem;
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        .select-container {
            margin-bottom: 20px;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
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

    <script>
        document.getElementById('userForm').addEventListener('submit', function(event) {
            var userId = document.getElementById('user_id').value;

            if (userId) {
                this.action = "/bets/" + userId;
            } else {
                event.preventDefault();
                alert("Por favor, selecciona un usuario.");
            }
        });
    </script>

</body>
</html>
