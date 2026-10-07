<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login', [
            'previousUrl' => back()->getTargetUrl()
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
        ]);
        $previousUrl = $request['previousUrl'];

        $login = $request->input('login');
        $loginType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginType => $login,
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials, $request->boolean('remenber'))) {
            $request->session()->regenerate();
            $route = $previousUrl ? $previousUrl : route('dashboard', absolute: false);
            return redirect()->intended($route);
        }

        return back()->withErrors([
            'login' => 'O login (email/username) e/ou senha fornecido(s) é(são) inválido(s).'
        ])->onlyInput('login');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}


// public function store(Request $request): RedirectResponse // <--- Trocamos LoginRequest por Request
//   {
//       // 1. Validação manual (substituindo o que o LoginRequest fazia)
//       $request->validate([
//           'login' => ['required', 'string'], // Chamamos o campo de 'login' (genérico)
//           'password' => ['required', 'string'],
//       ]);

//       // 2. Identificar se o valor digitado é um e-mail ou um username
//       $loginValue = $request->input('login');

//       // Usamos o filter_var do PHP para checar se o formato é de e-mail
//       $fieldType = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

//       // 3. Montamos as credenciais dinamicamente
//       // Se for e-mail, vira ['email' => '...', 'password' => '...']
//       // Se for username, vira ['username' => '...', 'password' => '...']
//       $authCredentials = [
//           $fieldType => $loginValue,
//           'password' => $request->input('password'),
//       ];

//       // 4. Tenta autenticar no banco de dados
//       if (Auth::attempt($authCredentials, $request->boolean('remember'))) {
//           $request->session()->regenerate();
//           return redirect()->intended(route('dashboard', absolute: false));
//       }

//       // 5. Se falhar, volta para a página de login com erro
//       return back()->withErrors([
//           'login' => 'As credenciais fornecidas não coincidem com nossos registros.',
//       ])->onlyInput('login');
//   }