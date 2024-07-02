<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                
    }

    public function read() 
    {
        $cliente = Cliente::all();
        return $cliente;
    }

    public function postCliente(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nomeCliente = $request->nomeCliente;
        $cliente->emailCliente = $request->emailCliente;
        $cliente->telefoneCliente = $request->telefoneCliente;
        $cliente->senhaCliente = $request->senhaCliente;
        $cliente->save();
        return redirect('./cadastro')->with('status', 'Cadastro feito com sucesso');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $cliente = new Cliente();
        $cliente->nomeCliente = $request->nomeCliente;
        $cliente->emailCliente = $request->emailCliente;
        $cliente->telefoneCliente = $request->telefoneCliente;
        $cliente->senhaCliente = $request->senhaCliente;
        $cliente->save();

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        Cliente::where('idCliente', $id)->update([
            'nomeCliente' => $request->nomeCliente,
            'emailCliente' => $request->emailCliente,
            'telefoneCliente' => $request->telefoneCliente,
            'senhaCliente' => $request->senhaCliente,
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
        Cliente::where('idCliente', $id)->delete();

        return response()->json([
            'message' => 'Dados excluídos com sucesso',
            'code' => 200,
        ]);
    }
}
