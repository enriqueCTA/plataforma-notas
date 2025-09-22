<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    protected $table = 'usuarios'; // asegura que apunte a la tabla correcta
    public $timestamps = false;    // desactiva created_at y updated_at

    // Ejemplo de método para buscar por email
    public static function findByEmail($email)
    {
        return self::where('email', $email)->first();

    }

    public static function register(array $data): self
    {
        $usuario = new self();
        $usuario->nombre = $data['nombre'];
        $usuario->email = $data['email'];
        $usuario->password = Hash::make($data['password']);
        $usuario->save();
        
        return $usuario;
    }
}

