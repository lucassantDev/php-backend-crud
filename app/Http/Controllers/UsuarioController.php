<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index()
    {
        // todos os campos são puxados | consulta/mostrar dados(get)
        $usuario = Usuario::all();
        return response()->json($usuario, 200);
    }


    public function store(Request $request)
    {
        // campos considerados obrigatórios para recebimento de dados | inserir(post)
        $validated = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'cpf' => 'required|string',
            'primeira_nota' => 'nullable|numeric',
            'segunda_nota' => 'nullable|numeric',
            'terceira_nota' => 'nullable|numeric',
            'quarta_nota' => 'nullable|numeric'
        ]);

        $usuario = Usuario::create($validated);
        return response()->json($usuario, 201);
    }

    public function update(Request $request, Usuario $usuario)
    {
        // campos considerados obrigatórios para recebimento de dados | atualizar(put)
        $validated = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'cpf' => 'required|numeric',
            'primeira_nota' => 'nullable|numeric',
            'segunda_nota' => 'nullable|numeric',
            'terceira_nota' => 'nullable|numeric',
            'quarta_nota' => 'nullable|numeric'
        ]);

        $usuario->update($validated);
        return response()->json($usuario, 200);
    }


    public function destroy(Usuario $usuario)
    {
        // deletando usuário | deletar(delete)
        $usuario->delete();

        return response()->json([
            'message' => 'Usuário deletado com sucesso!'
        ], 200);
    }
}
