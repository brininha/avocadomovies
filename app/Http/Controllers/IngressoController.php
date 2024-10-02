<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingresso;
use Illuminate\Support\Facades\Log;

class IngressoController extends Controller
{
    public function update(Request $request, $id)
    {
        try {
            // Valida os dados recebidos
            $validatedData = $request->validate([
                'statusIngresso' => 'required|integer',
            ]);

            // Tenta encontrar o ingresso pelo ID
            $ingresso = Ingresso::findOrFail($id);

            // Atualiza o status do ingresso
            $ingresso->update($validatedData);

            // Retorna a resposta de sucesso
            return response()->json([
                'message' => 'Ingresso usado com sucesso',
                'data' => $ingresso,
                'code' => 200,
            ]);
        } catch (\Exception $e) {
            // Registra o erro no arquivo de logs
            Log::error('Erro ao atualizar ingresso: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'exception_trace' => $e->getTraceAsString()
            ]);

            // Retorna uma resposta de erro
            return response()->json([
                'message' => 'Erro ao usar o ingresso',
                'error' => $e->getMessage(),
                'code' => 500,
            ], 500);
        }
    }
}
