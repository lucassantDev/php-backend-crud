<?php

namespace App\Http\Controllers;

use App\Models\Administradores;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministradoresController extends Controller
{

    public function index()
    {
        $administradores = Administradores::all();
        return response()->json($administradores, 200);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'e-mail' => 'required|string',
            'cpf' => 'required|string'
        ]);

        $administradores = Administradores::create($validated);
        return response()->json($administradores, 201);
    }


    public function update(Request $request, Administradores $administradores)
    {
         $validated = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'e-mail' => 'required|string',
            'cpf' => 'required|string'
        ]);

        $administradores->update($validated);
        return response()->json($administradores, 200);
    }


    public function destroy(Administradores $administradores)
    {
        $administradores->delete();

        return response()->json([
            'message' => 'Administrador deletado com sucesso!'
        ], 200);
    }
}
