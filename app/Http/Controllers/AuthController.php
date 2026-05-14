<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Busca o usuário pelo login e senha pura (sem hash)
        $user = User::where('login', $request->login)
                    ->where('password', $request->password)
                    ->first();

        if ($user) {
            Auth::login($user); // Loga o usuário na sessão
            return redirect()->route('carros.index');
        }

        return back()->withErrors(['erro' => 'Login ou senha inválidos']);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}