<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        // Vérifier si l'email existe dans la base
        $userExists = \App\Models\User::where('email', $credentials['email'])->exists();

        if ($userExists) {
            // Email correct, tenter d'authentifier avec le mot de passe
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard', absolute: false));
            } else {
                // Mot de passe incorrect
                throw ValidationException::withMessages([
                    'password' => __('Le mot de passe est incorrect.'),
                ]);
            }
        } else {
            // Email incorrect
            throw ValidationException::withMessages([
                'email' => __('Nous ne trouvons pas d\'utilisateur avec cette adresse email.'),
            ]);
        }
    }
    /**
     * Destroy an authenticated session.
     */
  public function destroy(Request $request)
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirection vers login après déconnexion
    return redirect()->route('login');
}
}
