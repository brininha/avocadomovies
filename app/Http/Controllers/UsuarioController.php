<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    // public function mostrarFormLogin()
    // {
    //     return view('auth.login');
    // }

    public function login(Request $request)
    {
        $validacao = $request->validate([
            'emailUsuario' => ['required', 'email'],
            'senhaUsuario' => ['required'],
        ]);

        if (Auth::attempt(['emailUsuario' => $validacao['emailUsuario'], 'password' => $validacao['senhaUsuario']])) {
            $request->session()->regenerate();

            $usuario = Auth::user();

            if ($usuario->tipoUsuario === 'admin') {
                return redirect()->intended('admin/dashboard');
            } elseif ($usuario->tipoUsuario === 'cliente') {
                return redirect()->intended('cliente/dashboard');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'emailUsuario' => 'Tipo de usuário desconhecido.',
                ]);
            }
        }


        return back()->withErrors([
            'emailUsuario' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('emailUsuario');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logout realizado com sucesso!');
    }
}
