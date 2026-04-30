<?php

namespace App\Http\Controllers;

use App\Models\Agente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgenteController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agentes = Agente::with('user.rol')->paginate(10);
        return view('Admin.agentes.index', compact('agentes'));
    }

    /**
     * Public view - list all agents for public display
     */
    public function agentesPublicos()
    {
        // Get all agents where the user role is 'agente' and user is active
        $agentes = Agente::whereHas('user', function ($query) {
            $query->where('active', 1)->whereHas('rol', function ($q) {
                $q->where('nombre', 'agente');
            });
        })->with('user')->get();
        
        return view('modulos.agentes.agentes', compact('agentes'));
    }

    /**
     * Public view - show agent details with their houses
     */
    public function verAgentePublico($id)
    {
        $agente = Agente::with('user')->findOrFail($id);

        $casas = $agente->casas()
            ->with(['fotos' => function ($query) {
                $query->orderByDesc('foto_principal');
            }])
            ->whereIn('estado', ['disponible', 'vendido', 'alquilado', 'entregado'])
            ->paginate(10);

        return view('modulos.agentes.ver-agente', compact('agente', 'casas'));
    }

    public function verAgente($id)
    {
        $agente = Agente::with('user.rol')->findOrFail($id);
        return view('Admin.agentes.show', compact('agente'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Agente $agente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agente = Agente::findOrFail($id);
        return view('Admin.agentes.edit', compact('agente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $agente = Agente::findOrFail($id);

        $request->validate([
            'telefono' => 'nullable|string|max:20',
            'comision_predeterminada' => 'nullable|numeric|min:0|max:100',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['telefono', 'comision_predeterminada']);

        if ($request->hasFile('foto')) {
            if ($agente->foto) {
                Storage::disk('public')->delete($agente->foto);
            }

            $data['foto'] = $request->file('foto')->store('agentes', 'public');
        }

        $agente->update($data);

        return redirect()->route('agentes.index')->with('success', 'Agente actualizado correctamente.');

    }

/**
     * Remove the specified resource from storage.
     */
    public function destroy(Agente $agente)
    {
        //
    }

    /**
     * Show the profile editing form for the logged-in agent.
     */
    public function miPerfil()
    {
        $user = auth()->user();
        
        if (!$user || !$user->agente) {
            return redirect()->route('dashboard')->with('error', 'No tienes un perfil de agente asociado.');
        }

        $agente = $user->agente;
        return view('Admin.agentes.editarPerfil', compact('agente'));
    }

    /**
     * Update the logged-in agent's profile.
     */
    public function actualizarMiPerfil(Request $request)
    {
        $user = auth()->user();
        
        if (!$user || !$user->agente) {
            return redirect()->route('dashboard')->with('error', 'No tienes un perfil de agente asociado.');
        }

        $agente = $user->agente;

        $request->validate([
            'telefono' => 'nullable|string|max:20',
            'comision_predeterminada' => 'nullable|numeric|min:0|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['telefono', 'comision_predeterminada']);

        if ($request->hasFile('foto')) {
            if ($agente->foto) {
                Storage::disk('public')->delete($agente->foto);
            }

            $data['foto'] = $request->file('foto')->store('agentes', 'public');
        }

        $agente->update($data);

        return redirect()->route('agente.perfil')->with('success', 'Perfil actualizado correctamente.');
    }
}
