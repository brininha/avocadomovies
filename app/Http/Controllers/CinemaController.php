<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cinema;

class CinemaController extends Controller
{
    public function read()
    {
        $cinemas = Cinema::orderBy('nomeCinema')->get();

        return view('admin/cinemas', compact('cinemas'));
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $this->validateCinema($request);

        // Criação de uma nova instância de Cinema
        $cinema = new Cinema();
        $cinema->nomeCinema = $request->nomeCinema;
        $cinema->telefoneCinema = $request->telefoneCinema;
        $cinema->numLogradouroCinema = $request->numLogradouroCinema;
        $cinema->logradouroCinema = $request->logradouroCinema;
        $cinema->bairroCinema = $request->bairroCinema;
        $cinema->cidadeCinema = $request->cidadeCinema;
        $cinema->estadoCinema = $request->estadoCinema;
        $cinema->cepCinema = $request->cepCinema;
        $cinema->latitudeCinema = $request->latitudeCinema;
        $cinema->longitudeCinema = $request->longitudeCinema;
        $cinema->dataInauguracao = $request->dataInauguracao;

        $cinema->save();

        return response()->json(['success' => true, 'message' => 'Cinema cadastrado com sucesso!']);
    }

    public function destroy($id)
    {
        Cinema::where('idCinema', $id)->update([
            'excluido' => 1,
        ]);

        return redirect()->back()->with('message', 'Cinema excluído com sucesso!');
    }

    private function validateCinema(Request $request)
    {
        $request->validate([
            'nomeCinema' => 'required|string|max:255',
            'telefoneCinema' => 'required|string|max:20',
            'numLogradouroCinema' => 'required|string|max:10',
            'logradouroCinema' => 'required|string|max:255',
            'bairroCinema' => 'required|string|max:255',
            'cidadeCinema' => 'required|string|max:255',
            'estadoCinema' => 'required|string|max:2',
            'cepCinema' => 'required|string|size:8',
            'latitudeCinema' => 'nullable|numeric',
            'longitudeCinema' => 'nullable|numeric',
            'dataInauguracao' => 'required|date|before_or_equal:today',
        ]);
    }

    public function getCinemasLocation()
    {
        $cinemas = Cinema::select('bairroCinema', 'cidadeCinema', 'nomeCinema')->get();
        return response()->json($cinemas);
    }

}
