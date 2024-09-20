<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function read()
    {
        $usuarios = Cliente::all()->sortBy('nomeCliente');
        return view('admin/usuarios', compact('usuarios'));
    }
    public function store(Request $request)
    {
        // Validação de dados
        $validated = $request->validate([
            'nomeCliente' => 'required|string|max:255',
            'emailCliente' => 'required|email|unique:tbCliente,emailCliente',
            'telefoneCliente' => 'required|string|max:20',
            'senhaCliente' => 'required|string|min:6',
        ]);

        try {
            $cliente = new Cliente();
            $cliente->nomeCliente = $validated['nomeCliente'];
            $cliente->emailCliente = $validated['emailCliente'];
            $cliente->telefoneCliente = $validated['telefoneCliente'];
            $cliente->senhaCliente = bcrypt($validated['senhaCliente']); // Criptografando a senha
            $cliente->save();

            return redirect()->back()->with('message', 'Cadastro feito com sucesso! 🎉');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao criar o usuário!' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        // Validação de dados
        $validated = $request->validate([
            'nomeCliente' => 'required|string|max:255',
            'emailCliente' => 'required|email|unique:clientes,emailCliente,' . $id . ',idCliente',
            'telefoneCliente' => 'required|string|max:20',
            'senhaCliente' => 'nullable|string|min:6',
        ]);

        try {
            Cliente::where('idCliente', $id)->update([
                'nomeCliente' => $validated['nomeCliente'],
                'emailCliente' => $validated['emailCliente'],
                'telefoneCliente' => $validated['telefoneCliente'],
                'senhaCliente' => $validated['senhaCliente'] ? bcrypt($validated['senhaCliente']) : Cliente::find($id)->senhaCliente,
            ]);

            return response()->json([
                'message' => 'Cliente atualizado com sucesso!',
                'code' => 200,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao criar o usuário: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        Cliente::where('idCliente', $id)->update([
            'excluido' => 1,
        ]);

        return redirect()->back()->with('message', 'Usuário excluído com sucesso!');
    }
}

?>
