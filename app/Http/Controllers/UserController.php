<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('Admin.login.login');
    }

    public function crearAdmin()
    {
        $usuario = User::where('email', 'Admin@gmail.com')->first();

        if (!$usuario) {
            User::create([
                'name' => 'Admin-Neycer',
                'email' => 'Neycer.dev@gmail.com',
                'password' => Hash::make('Micaela69234558N'), 
                
            ]);

            return "Usuario administrador creado exitosamente.";
        }

        return "El usuario administrador ya existe. No es necesario crearlo nuevamente.";
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (auth()->attempt($credentials, $remember)) {
            // prevenir session fixation
            $request->session()->regenerate();

            // redirige a la ruta originalmente intentada o a casas.index por defecto
            return redirect()->intended(route('casas.index'));
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
