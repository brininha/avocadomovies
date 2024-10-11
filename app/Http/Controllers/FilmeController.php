<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Genero;
use App\Models\Idioma;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FilmeController extends Controller
{

    public function index()
    {
        $filmes = Filme::all();
        return response()->json($filmes);
    }

    public function read(Request $request)
    {
        $filmes = Filme::orderBy('nomeFilme')->get();
        $generos = Genero::all();
        $idiomas = Idioma::all();

        if ($request->has('view') && $request->view == 'adminFilmes') {
            return view('admin/filmes', compact('filmes', 'generos', 'idiomas'));
        }

        return view('home', compact('filmes', 'generos'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomeFilme' => 'required|string',
            'descFilme' => 'required|string',
            'idGenero' => 'required|integer',
            'dataLancamento' => 'required|date',
            'duracaoFilme' => 'required|integer',
            'diretorFilme' => 'required|string',
            'elencoFilme' => 'required|string',
            'idIdioma' => 'required|integer',
            'faixaEtariaFilme' => 'required|string',
            'dataEntradaCartaz' => 'required|date',
            'dataSaidaCartaz' => 'required|date',
            'trailerFilme' => 'required|url',
            'capaFilme' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validatedData['dataAtualizacao'] = Carbon::now();

        if ($request->hasFile('capaFilme')) {
            $file = $request->file('capaFilme');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $filename);

            $validatedData['capaFilme'] = $filename;
        }

        $filme = Filme::create($validatedData);
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomeFilme' => 'required|string',
            'descFilme' => 'required|string',
            'idGenero' => 'required|integer',
            'dataLancamento' => 'required|date',
            'duracaoFilme' => 'required|integer',
            'diretorFilme' => 'required|string',
            'elencoFilme' => 'required|string',
            'idIdioma' => 'required|integer',
            'faixaEtariaFilme' => 'required|string',
            'dataEntradaCartaz' => 'required|date',
            'dataSaidaCartaz' => 'required|date',
            'trailerFilme' => 'required|url',
            'capaFilme' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Permitindo que a imagem seja opcional
        ]);

        $filme = Filme::findOrFail($id);

        $filme->nomeFilme = $validatedData['nomeFilme'];
        $filme->descFilme = $validatedData['descFilme'];
        $filme->idGenero = $validatedData['idGenero'];
        $filme->dataLancamento = $validatedData['dataLancamento'];
        $filme->duracaoFilme = $validatedData['duracaoFilme'];
        $filme->diretorFilme = $validatedData['diretorFilme'];
        $filme->elencoFilme = $validatedData['elencoFilme'];
        $filme->idIdioma = $validatedData['idIdioma'];
        $filme->faixaEtariaFilme = $validatedData['faixaEtariaFilme'];
        $filme->dataEntradaCartaz = $validatedData['dataEntradaCartaz'];
        $filme->dataSaidaCartaz = $validatedData['dataSaidaCartaz'];
        $filme->trailerFilme = $validatedData['trailerFilme'];
        $filme->dataAtualizacao = Carbon::now();

        if ($request->hasFile('capaFilme')) {
            $file = $request->file('capaFilme');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $filename);

            $filme->capaFilme = $filename;
        }

        $filme->save();

        return redirect()->back()->with('success', 'Filme atualizado com sucesso!');
    }


    // Excluir um filme
    public function destroy($id)
    {
        Filme::where('idFilme', $id)->update([
            'excluido' => 1,
        ]);

        return redirect()->back()->with('message', 'Filme excluído com sucesso!');
    }

    public function find($id)
    {
        $filme = Filme::find($id);
        $genero = Genero::find($filme->idGenero);

        if (!$filme) {
            return response()->json(['mensagem' => 'Filme não encontrado'], 404);
        }

        return view('filme', compact('filme', 'genero'));
    }
}
