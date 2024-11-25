<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Exibir a página de login
    public function showLogin()
    {
        // Verifica se o usuário já está autenticado
        if (Auth::check()) {
            // Se já estiver logado, redireciona para a página anterior ou para o dashboard
            return redirect()->intended('admin'); // A página que o usuário tentava acessar antes
        }

        return view('auth.login');
    }


    public function processLogin(Request $request)
    {
        
        // Valida os dados do formulário
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Tenta autenticar o usuário
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Regenera a sessão para segurança
            $request->session()->regenerate();

            // Redireciona o usuário conforme o nível de acesso
            return $this->redirectUserBasedOnRole();
        }

        // Retorna com erro se as credenciais forem inválidas (em formato JSON)
        return response()->json([
            'success' => false,
            'message' => 'As credenciais não são válidas.',
        ], 401); // Código HTTP 401 para erro de autenticação
    }

    protected function redirectUserBasedOnRole()
    {
        $user = Auth::user(); // Obtém o usuário logado

        if ($user->nivelAcesso === 'admin') {
            // Se for admin, redireciona para o dashboard
            return response()->json([
                'success' => true,
                'redirect_url' => route('dashboard'),
            ]);
        } elseif ($user->nivelAcesso === 'papelaria') {
            // Se for papelaria, redireciona para a rota da papelaria
            return response()->json([
                'success' => true,
                'redirect_url' => route('papelaria'),
            ]);
        }

        // Se não tiver nível de acesso definido, redireciona para uma página de erro
        return response()->json([
            'success' => false,
            'message' => 'Nível de acesso não reconhecido.',
            'redirect_url' => route('login'),
        ], 403); // Código HTTP 403 para erro de acesso
    }


    // Fazer logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalida a sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
