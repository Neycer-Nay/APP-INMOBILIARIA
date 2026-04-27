<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    
    public function indexBoton()
    {
        return view('Admin.login.login');
    }

    public function index()
    {
        $usuarios = User::with('rol')->paginate(10);
        return view('Admin.usuarios.index', compact('usuarios'));
    }

    public function crearAdmin()
    {
        $usuario = User::where('email', 'Admin@gmail.com')->first();

        if (!$usuario) {
            User::create([
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'role_id' => '1',
                'password' => Hash::make('Admin10*'),
                'active' => true
            ]);

            // Retorna directamente la vista login con mensaje flash
            return view('Admin.login.login')->with('success', 'Usuario administrador creado exitosamente.');
        }

        // Retorna la misma vista login con mensaje flash de info
        return view('Admin.login.login')->with('info', 'El usuario administrador ya existe, no es necesario crearlo nuevamente.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            // prevenir session fixation
            $request->session()->regenerate();

            // redirige a la ruta originalmente intentada o a casas.index por defecto
            return redirect()->intended(route('casas.index'))->with('success', 'Bienvenido al panel de administración.');
        }

        return back()->with('error', 'Las credenciales proporcionadas no son correctas.')->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function create()
    {
        return view('Admin.usuarios.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => $validatedData['role_id'],
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Admin.usuarios.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validated();

        $data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role_id' => $validatedData['role_id'],
        ];

        if (!empty($validatedData['password'])) {
            $data['password'] = Hash::make($validatedData['password']);
        }

        $user->update($data);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    public function userEstado($id): RedirectResponse
    {
        $user = User::findOrFail($id);

        // Cambia el estado
        $user->active = !$user->active;
        $user->save();

        // Mensaje dinámico según el estado
        if ($user->active) {
            return redirect()->route('usuarios.index')
                ->with('success', 'Usuario activado exitosamente.');
        } else {
            return redirect()->route('usuarios.index')
                ->with('warning', 'Usuario desactivado exitosamente.');
        }
    }

}
