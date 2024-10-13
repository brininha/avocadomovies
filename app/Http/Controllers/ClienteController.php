<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Rules\Cpf;


class ClienteController extends Controller
{
    /**
     * Exibir o dashboard do cliente.
     */
    // public function dashboard()
    // {
    //     $usuario = auth()->user()->load('cliente');

    //     return view('cliente.dashboard', compact('usuario'));
    // }

    /**
     * Exibir a lista de todos os clientes (Apenas Admin).
     */
    public function index()
    {
        $clientes = Usuario::where('tipoUsuario', 'cliente')->with('cliente')->get();

        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Exibir o formulário de criação de cliente (Apenas Admin).
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Armazenar um novo cliente (Apenas Admin).
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nomeUsuario' => 'required|string|max:255',
            'emailUsuario' => 'required|email|unique:tbUsuario,emailUsuario',
            'senhaUsuario' => 'required|string|min:6|confirmed',
            'cpfCliente' => ['required', new Cpf(), 'unique:tbCliente,cpfCliente'],
            'telefoneCliente' => 'required|string|max:20',
            'dataNascCliente' => 'required|date',
        ]);

        // Iniciar uma transação para garantir a consistência dos dados
        DB::beginTransaction();

        try {
            $usuario = Usuario::create([
                'nomeUsuario' => $validated['nomeUsuario'],
                'emailUsuario' => $validated['emailUsuario'],
                'senhaUsuario' => Hash::make($validated['senhaUsuario']),
                'tipoUsuario' => 'cliente',
            ]);

            // Criar o registro na tabela 'cliente'
            Cliente::create([
                'idUsuario' => $usuario->idUsuario,
                'cpfCliente' => $validated['cpfCliente'],
                'telefoneCliente' => $validated['telefoneCliente'],
                'dataNascCliente' => $validated['dataNascCliente'],
            ]);

            // Confirmar a transação
            DB::commit();

            // Redirecionar com uma mensagem de sucesso
            return redirect()->route('clientes.index')->with('message', 'Cliente cadastrado com sucesso! 🎉');

        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();

            // Redirecionar de volta com uma mensagem de erro
            return redirect()->back()->withErrors(['error' => 'Erro ao realizar o cadastro: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Exibir o formulário de edição de cliente (Apenas Admin).
     */
    public function edit($id)
    {
        $usuario = Usuario::where('idUsuario', $id)->where('tipoUsuario', 'cliente')->with('cliente')->firstOrFail();

        return view('admin.clientes.edit', compact('usuario'));
    }

    /**
     * Atualizar um cliente existente (Apenas Admin).
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nomeUsuario' => 'required|string|max:255',
            'emailUsuario' => 'required|email|unique:usuario,emailUsuario,' . $id . ',idUsuario',
            'senhaUsuario' => 'nullable|string|min:6|confirmed',
            'cpfCliente' => 'required|cpf|unique:cliente,cpfCliente,' . $id . ',idCliente',
            'telefoneCliente' => 'required|string|max:20',
            'dataNascCliente' => 'required|date',
        ]);

        // Iniciar uma transação para garantir a consistência dos dados
        DB::beginTransaction();

        try {
            // Atualizar o registro na tabela 'usuario'
            $usuario = Usuario::where('idUsuario', $id)->where('tipoUsuario', 'cliente')->firstOrFail();
            $usuario->nomeUsuario = $validated['nomeUsuario'];
            $usuario->emailUsuario = $validated['emailUsuario'];
            if (!empty($validated['senhaUsuario'])) {
                $usuario->senhaUsuario = Hash::make($validated['senhaUsuario']);
            }
            $usuario->save();

            // Atualizar o registro na tabela 'cliente'
            $cliente = Cliente::where('idUsuario', $id)->firstOrFail();
            $cliente->cpfCliente = $validated['cpfCliente'];
            $cliente->telefoneCliente = $validated['telefoneCliente'];
            $cliente->dataNascCliente = $validated['dataNascCliente'];
            $cliente->save();

            // Confirmar a transação
            DB::commit();

            // Redirecionar com uma mensagem de sucesso
            return redirect()->route('clientes.index')->with('message', 'Cliente atualizado com sucesso! 🎉');

        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();

            // Redirecionar de volta com uma mensagem de erro
            return redirect()->back()->withErrors(['error' => 'Erro ao atualizar o cliente: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Excluir um cliente (Apenas Admin).
     */
    public function destroy($id)
    {
        // Iniciar uma transação para garantir a consistência dos dados
        DB::beginTransaction();

        try {
            $usuario = Usuario::where('idUsuario', $id);

            $usuario->update(['excluido' => 1]);

            // Confirmar a transação
            DB::commit();

            // Redirecionar com uma mensagem de sucesso
            return redirect()->back()->with('message', 'Cliente excluído com sucesso!');

        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();

            // Redirecionar de volta com uma mensagem de erro
            // return redirect()->back()->withErrors(['error' => 'Erro ao marcar o cliente como excluído: ' . $e->getMessage()]);
        }
    }

    /**
     * Processar o cadastro de um novo cliente.
     * Utilizado para registro por parte dos clientes (não Admin).
     */
    public function registro(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nomeUsuario' => 'required|string|max:255',
            'emailUsuario' => 'required|email|unique:tbUsuario,emailUsuario',
            'senhaUsuario' => 'required|string|min:6|confirmed',
            'cpfCliente' => ['required', new Cpf(), 'unique:tbCliente,cpfCliente'],
            'telefoneCliente' => 'required|string|max:20',
            'dataNascCliente' => 'required|date',
        ]);

        // Iniciar uma transação para garantir a consistência dos dados
        DB::beginTransaction();

        try {
            // Criar o registro na tabela 'usuario'
            $usuario = Usuario::create([
                'nomeUsuario' => $validated['nomeUsuario'],
                'emailUsuario' => $validated['emailUsuario'],
                'senhaUsuario' => Hash::make($validated['senhaUsuario']),
                'tipoUsuario' => 'cliente',
            ]);

            // Criar o registro na tabela 'cliente'
            Cliente::create([
                'idUsuario' => $usuario->idUsuario,
                'cpfCliente' => $validated['cpfCliente'],
                'telefoneCliente' => $validated['telefoneCliente'],
                'dataNascCliente' => $validated['dataNascCliente'],
            ]);

            // Confirmar a transação
            DB::commit();

            // Redirecionar com uma mensagem de sucesso
            return redirect()->back()->with('message', 'Cadastro realizado com sucesso!');

        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();

            // Redirecionar de volta com uma mensagem de erro
            return redirect()->back()->withErrors(['error' => 'Erro ao realizar o cadastro: ' . $e->getMessage()])->withInput();
        }
    }
}
