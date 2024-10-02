<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Genero;
use Illuminate\Http\Request;

class FilmeController extends Controller
{

    public function index() {
        $filmes = Filme::all();
        return response()->json($filmes);
    }
    
    public function read(Request $request)
    {
        $filmes = Filme::orderBy('nomeFilme')->get();
        $generos = Genero::all();

        if ($request->has('view') && $request->view == 'adminFilmes') {
            return view('admin/filmes', compact('filmes', 'generos'));
        }

        return view('home', compact('filmes'));

    }

    // Armazenar um novo filme
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomeFilme' => 'required|string|max:255',
            'capaFilme' => 'nullable|string|max:255',
            'descFilme' => 'required|string',
            'idGenero' => 'required|integer',
            'statusFilme' => 'required|boolean',
        ]);

        $filme = Filme::create($validatedData);

        return response()->json([
            'message' => 'Filme inserido com sucesso',
            'data' => $filme,
            'code' => 201,
        ], 201);
    }

    // Atualizar um filme existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomeFilme' => 'required|string|max:255',
            'capaFilme' => 'nullable|string|max:255',
            'descFilme' => 'required|string',
            'idGenero' => 'required|integer',
            'statusFilme' => 'required|boolean',
        ]);

        $filme = Filme::findOrFail($id);
        $filme->update($validatedData);

        return response()->json([
            'message' => 'Filme atualizado com sucesso',
            'data' => $filme,
            'code' => 200,
        ]);
    }

    // Excluir um filme
    public function destroy($id)
    {
        Filme::where('idFilme', $id)->update([
            'excluido' => 1,
        ]);

        return redirect()->back()->with('message', 'Filme excluído com sucesso!');
    }
}
