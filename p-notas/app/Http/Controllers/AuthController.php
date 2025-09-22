<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;


class AuthController extends Controller
{

 
    public function showLogin()
    {
        return view('login'); // resources/views/login.blade.php
    }

    public function login(Request $request)
    {
        // Validar campos vacíos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Buscar usuario por email
        $usuario = Usuario::where('email', $request->email)->first();        

        if ($usuario && Hash::check($request->password, $usuario->password)) {
            // Guardar usuario en sesión
            $request->session()->put('usuario', $usuario);

            return redirect()->route('index');
        }

        // Credenciales inválidas
        return back()->withErrors(['login' => 'Email o contraseña incorrectos']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('usuario'); // eliminar sesión
        return redirect()->route('login');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'password' => ['required', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*\d).+$/'],
          ]);
          
          $usuario = Usuario::register($validated);
        
        // Opción recomendada: autologin + redirect
  $request->session()->put('usuario', $usuario);
  return redirect()->route('index')->with('status', 'Usuario registrado');
        
    }

  

}
