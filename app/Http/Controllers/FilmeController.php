<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filme;

class FilmeController extends Controller
{

    public function index()
    {
        $filme = Filme::all();
        return view('home', compact('filme'));
    }

    public function read()
    {
        $filme = Filme::orderby('idFilme')->get();
        return $filme;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filme = new Filme();
        $filme->nomeFilme = $request->nomeFilme;
        $filme->capaFilme = $request->capaFilme;
        $filme->descFilme = $request->descFilme;
        $filme->idGenero = $request->idGenero;
        $filme->statusFilme = $request->statusFilme;
        $filme->save();

        return response()->json([
            'message' => 'Dados inseridos com sucesso',
            'code' => 200,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Filme::where('idFilme', $id)->update([
            'nomeFilme' => $request->nomeFilme,
            'capaFilme' => $request->capaFilme,
            'descFilme' => $request->descFilme,
            'idGenero' => $request->idGenero,
            'statusFilme' => $request->statusFilme,
        ]);

        return response()->json([
            'message' => 'Dados alterados com sucesso',
            'code' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Filme::where('idFilme', $id)->delete();
        return response()->json([
            'message' => 'Dados excluídos com sucesso',
            'code' => 200,
        ]);
    }
}
