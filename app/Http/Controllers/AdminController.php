<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Admin;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Exibir o dashboard do admin.
     */
    public function dashboard()
    {
        $usuarios = Usuario::all();

        return view('admin.dashboard', compact('usuarios'));
    }

    public function usuarios(Request $request)
    {
        $usuarios = Usuario::all();
        $clientes = Cliente::all();
        $admins = Admin::all();
        return view('admin.usuarios', compact('usuarios', 'clientes', 'admins'));
    }

    /**
     * Exibir a lista de todos os admins (Apenas Admin).
     */
    public function index()
    {
        $admins = Usuario::where('tipoUsuario', 'admin')->with('admin')->get();

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Exibir o formulário de criação de admin (Apenas Admin).
     */
    // public function create()
    // {
    //     return view('admin.admins.create');
    // }

    /**
     * Armazenar um novo admin (Apenas Admin).
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nomeUsuario' => 'required|string|max:255',
            'emailUsuario' => 'required|email|unique:tbUsuario,emailUsuario',
            'senhaUsuario' => 'required|string|min:6|confirmed',
        ]);

        // Iniciar uma transação para garantir a consistência dos dados
        DB::beginTransaction();

        try {
            // Criar o registro na tabela 'usuario'
            $usuario = Usuario::create([
                'nomeUsuario' => $validated['nomeUsuario'],
                'emailUsuario' => $validated['emailUsuario'],
                'senhaUsuario' => Hash::make($validated['senhaUsuario']),
                'tipoUsuario' => 'admin',
            ]);

            // Criar o registro na tabela 'admin'
            Admin::create([
                'idUsuario' => $usuario->idUsuario,
            ]);

            // Confirmar a transação
            DB::commit();

            // Redirecionar com uma mensagem de sucesso
            return redirect()->back()->with('message', 'Admin cadastrado com sucesso!');

        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();

            // Redirecionar de volta com uma mensagem de erro
            return redirect()->back()->withErrors(['error' => 'Erro ao realizar o cadastro: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Exibir o formulário de edição de admin (Apenas Admin).
     */
    public function edit($id)
    {
        $usuario = Usuario::where('idUsuario', $id)->where('tipoUsuario', 'admin')->with('admin')->firstOrFail();

        return view('admin.admins.edit', compact('usuario'));
    }

    /**
     * Atualizar um admin existente (Apenas Admin).
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nomeUsuario' => 'required|string|max:255',
            'emailUsuario' => 'required|email|unique:usuario,emailUsuario,' . $id . ',idUsuario',
            'senhaUsuario' => 'nullable|string|min:6|confirmed',
        ]);

        // Iniciar uma transação para garantir a consistência dos dados
        DB::beginTransaction();

        try {
            // Atualizar o registro na tabela 'usuario'
            $usuario = Usuario::where('idUsuario', $id)->where('tipoUsuario', 'admin')->firstOrFail();
            $usuario->nomeUsuario = $validated['nomeUsuario'];
            $usuario->emailUsuario = $validated['emailUsuario'];
            if (!empty($validated['senhaUsuario'])) {
                $usuario->senhaUsuario = Hash::make($validated['senhaUsuario']);
            }
            $usuario->save();

            // Atualizar o registro na tabela 'admin'
            $admin = Admin::where('idUsuario', $id)->firstOrFail();
            // Atualize outros campos específicos de Admin, se necessário
            $admin->save();

            // Confirmar a transação
            DB::commit();

            // Redirecionar com uma mensagem de sucesso
            return redirect()->route('admins.index')->with('message', 'Admin atualizado com sucesso! 🎉');

        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();

            // Redirecionar de volta com uma mensagem de erro
            return redirect()->back()->withErrors(['error' => 'Erro ao atualizar o admin: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Excluir um admin (Apenas Admin).
     */
    public function destroy($id)
    {
        // Iniciar uma transação para garantir a consistência dos dados
        DB::beginTransaction();

        try {
            // Encontrar o usuário e o admin
            $usuario = Usuario::where('idUsuario', $id)->where('tipoUsuario', 'admin')->firstOrFail();
            $admin = Admin::where('idUsuario', $id)->firstOrFail();

            // Excluir o admin e o usuário
            $admin->delete();
            $usuario->delete();

            // Confirmar a transação
            DB::commit();

            // Redirecionar com uma mensagem de sucesso
            return redirect()->route('admins.index')->with('message', 'Admin excluído com sucesso!');

        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();

            // Redirecionar de volta com uma mensagem de erro
            return redirect()->back()->withErrors(['error' => 'Erro ao excluir o admin: ' . $e->getMessage()]);
        }
    }

    /**
     * Exibir o formulário de registro de admin (Apenas Admin).
     */
    public function showRegisterForm()
    {
        return view('admin.admins.register_admin');
    }

    /**
     * Processar o cadastro de um novo admin (Apenas Admin).
     * Este método é semelhante ao store(), mas pode ser adaptado conforme necessário.
     */
    // Já implementado como store()
}
