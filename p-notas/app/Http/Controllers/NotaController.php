<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    public function index()
    {
        // SELECT * FROM notas
        $notas = DB::table('notas')->get();
        return view('index', compact('notas'));
    }

    public function create()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        // INSERT
        DB::table('notas')->insert([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'user_id' => 1, // de momento fijo
        ]);

    }

    public function edit($id)
    {
        // SELECT * FROM notas WHERE id = ?
        $nota = DB::table('notas')->where('id', $id)->first();
    }

    public function update(Request $request, $id)
    {
        // UPDATE
        DB::table('notas')
            ->where('id', $id)
            ->update([
                'titulo' => $request->titulo,
                'contenido' => $request->contenido,
            ]);

    }

    public function destroy($id)
    {
        // DELETE
        DB::table('notas')->where('id', $id)->delete();
    }
}

