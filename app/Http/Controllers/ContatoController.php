<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contato;

class ContatoController extends Controller
{
    // Método para obter todos os contatos
    public function read()
    {
        $contato = Contato::all();
        return response()->json($contato);
    }

    // Método para salvar novos dados de contato
    public function store(Request $request)
    {
        $this->validateContato($request);

        $contato = new Contato();
        $contato->nomeContato = $request->nomeContato;
        $contato->emailContato = $request->emailContato;
        $contato->telefoneContato = $request->telefoneContato;
        $contato->assuntoContato = $request->assuntoContato;
        $contato->mensagemContato = $request->mensagemContato;
        $contato->save();

        return redirect()->back()->with('message', 'Contato enviado com sucesso!');
    }

    // Método para atualizar um contato existente
    public function update(Request $request, $id)
    {
        $this->validateContato($request);

        Contato::where('idContato', $id)->update([
            'nomeContato' => $request->nomeContato,
            'emailContato' => $request->emailContato,
            'telefoneContato' => $request->telefoneContato,
            'assuntoContato' => $request->assuntoContato,
            'mensagemContato' => $request->mensagemContato,
        ]);

        return response()->json([
            'message' => 'Dados alterados com sucesso',
            'code' => 200,
        ]);
    }

    // Método para excluir um contato
    public function destroy($id)
    {
        Contato::where('idContato', $id)->delete();

        return response()->json([
            'message' => 'Dados excluídos com sucesso',
            'code' => 200,
        ]);
    }

    // Método alternativo para inserção (com redirect)
    public function insert(Request $request)
    {
        $this->validateContato($request);

        $contato = new Contato();
        $contato->nomeContato = $request->nomeContato;
        $contato->emailContato = $request->emailContato;
        $contato->telefoneContato = $request->telefoneContato;
        $contato->assuntoContato = $request->assuntoContato;
        $contato->mensagemContato = $request->mensagemContato;
        $contato->save();

        return redirect()->back()->with('message', 'Contato enviado com sucesso!');
    }

    // Método privado para validação (reutilizável)
    private function validateContato(Request $request)
    {
        $request->validate([
            'nomeContato' => 'required|string|max:255',
            'emailContato' => 'required|email|max:255',
            'telefoneContato' => 'nullable|string|max:20',
            'assuntoContato' => 'required|string|max:255',
            'mensagemContato' => 'required|string',
        ]);
    }
}
