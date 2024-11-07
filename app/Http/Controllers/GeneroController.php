<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GeneroController extends Controller
{
    public function index() {
        $generos = Genero::where('excluido', 0)->orderBy('nomeGenero')->get();
        return response()->json($generos);
    }

    public function read(Request $request)
    {
        $generos = Genero::orderBy('nomeGenero')->get();

        return view('admin/generos', compact('generos'));
    }

    // Exibir o formulário para criar um novo gênero (caso necessário)
    public function create()
    {
        return view('generos.create');
    }

    // Armazenar um novo gênero
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'nomeGenero' => 'required|string|max:255',
        ]);

        // Criação de um novo gênero
        $genero = Genero::create($validatedData);

        return redirect()->back()->with('message', 'Gênero cadastrado com sucesso!');
    }

    // Exibir um gênero específico (caso necessário)
    public function show($id)
    {
        $genero = Genero::findOrFail($id);
        return response()->json($genero);
    }

    // Exibir o formulário de edição de um gênero (caso necessário)
    public function edit($id)
    {
        $genero = Genero::findOrFail($id);
        return view('generos.edit', compact('genero'));
    }

    // Atualizar um gênero existente
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'nomeGenero' => 'required|string|max:255',
        ]);

        // Encontrar e atualizar o gênero
        $genero = Genero::findOrFail($id);
        $genero->update($validatedData);

        return response()->json([
            'message' => 'Gênero atualizado com sucesso',
            'data' => $genero,
            'code' => 200,
        ]);
    }

    // Excluir um gênero
    public function destroy($id)
    {
        Filme::where('idGenero', $id)->update(['idGenero' => 1]);
        Genero::where('idGenero', $id)->update([
            'excluido' => 1,
        ]);

        return redirect()->back()->with('message', 'Gênero excluído com sucesso!');
    }

    public function getFilmesGeneros()
    {
        $generos = DB::table('tbfilme')
        ->join('tbgenero', 'tbfilme.idGenero', '=', 'tbgenero.idGenero')
        ->select('tbgenero.nomeGenero', DB::raw('count(tbfilme.idGenero) as total'))->where('nomeGenero', "<>", 'Indefinido')
        ->groupBy('tbgenero.nomeGenero')
        ->get();

        return response()->json($generos);
    }
    public function getFilmesFaixas()
    {
        $faixasEtarias = DB::table('tbfilme')
        ->select('tbfilme.faixaEtariaFilme', DB::raw('count(tbfilme.idFilme) as total'))
        ->groupBy('tbfilme.faixaEtariaFilme')
        ->get();


        return response()->json($faixasEtarias);
    }
}
