<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if (!$user || !$user->agente) {
            return redirect()->route('dashboard')->with('error', 'No tienes un perfil de agente asociado.');
        }

        $clientes = Cliente::where('agente_id', $user->agente->id)
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('Admin.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user || !$user->agente) {
            return redirect()->route('dashboard')->with('error', 'No tienes un perfil de agente asociado.');
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'email' => 'required|email|max:255|unique:clientes,email',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:100',
        ]);

        $validated['agente_id'] = $user->agente->id;

        Cliente::create($validated);

        return redirect()->route('clientes.index')->with('success', 'Cliente registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
