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
}
