<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contato;

class ContatoController extends Controller
{
    
    public function index()
    {
        //
    }

    public function read()
    {
        $contato = Contato::all();
        return $contato;
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contato = new Contato();
        $contato->nomeContato = $request->nomeContato;
        $contato->emailContato = $request->emailContato;
        $contato->telefoneContato = $request->telefoneContato;
        $contato->assuntoContato = $request->assuntoContato;
        $contato->mensagemContato = $request->mensagemContato;
        $contato->save();

        return response()->json([
            'message' => 'Dados inseridos com sucesso',
            'code' => 200,
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contato::where('idContato', $id)->delete();

        return response()->json([
            'message' => 'Dados alterados com sucesso',
            'code' => 200,
        ]);
    }

    public function insert(Request $request) {
        $request->validate([
            'nomeContato' => 'required|string|max:255',
            'emailContato' => 'required|email|max:255',
            'telefoneContato' => 'nullable|string|max:20',
            'assuntoContato' => 'required|string|max:255',
            'mensagemContato' => 'required|string',
        ]);

        $contato = new Contato();
        $contato->nomeContato = $request->nomeContato;
        $contato->emailContato = $request->emailContato;
        $contato->telefoneContato = $request->telefoneContato;
        $contato->assuntoContato = $request->assuntoContato;
        $contato->mensagemContato = $request->mensagemContato;
        
        $contato->save();

        return redirect()->back()->with('success', 'Contato enviado com sucesso!');
    }
}
