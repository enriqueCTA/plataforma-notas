<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Singin</title>
</head>
<body>
    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <button>Login</button>  <button>Registrate</button>
      @if ($errors->any())
        <div style="color: red;">
            {{ $errors->first('login') }}
        </div>
    @endif


        <div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;" id="login">
            <form method="POST" action="{{ route('login.post')}}">
                @csrf
                <label style="margin-right: 10px;" for="email">Email:</label>
                <input type="email" name="email" id="email" required style="margin-right: 10px;" placeholder="Email" value="{{ old('email') }}" class="border border-gray-300 rounded-md p-2" >
                @error('email')
                <div style="color: red;">{{ $message }}</div>
                @enderror
                <br>
                <label style="margin-right: 10px;" for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required style="margin-right: 10px;" placeholder="Contraseña" value="{{ old('password') }}" class="border border-gray-300 rounded-md p-2">
                @error('password')
                <div style="color: red;">{{ $message }}</div>
                @enderror
                <br>
                <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Entrar</button>
            </form>
        </div>
    </div>

    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;" id="register">
    <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required style="margin-right: 10px;" placeholder="Nombre" value="{{ old('nombre') }}" class="border border-gray-300 rounded-md p-2">
            @error('nombre')
            <div style="color: red;">{{ $message }}</div>
            @enderror
            <label for="email">Email:</label>
            <input type="email" name="email" id="register_email" required style="margin-right: 10px;" placeholder="Email" value="{{ old('email') }}" class="border border-gray-300 rounded-md p-2">
            @error('email')
            <div style="color: red;">{{ $message }}</div>
            @enderror
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="register_password" required style="margin-right: 10px;" placeholder="Contraseña" value="{{ old('password') }}" class="border border-gray-300 rounded-md p-2">
            @error('password')
            <div style="color: red;">{{ $message }}</div>
            @enderror
            <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Registrate</button>
        </form>
    </div>
</body>
</html>