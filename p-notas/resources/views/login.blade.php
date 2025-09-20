<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Singin</title>
</head>
<body>
    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <h1>Login</h1>
        @if ($errors->any())
        <div style="color: red;">
            {{ $errors->first('login') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
    </div>
</body>
</html>