<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePropietarioRequest;
use App\Http\Requests\UpdatePropietarioRequest;

class PropietarioController extends Controller
{
    public function index()
    {
        $propietarios = Propietario::paginate(10);
        return view('Admin.propietarios.index', compact('propietarios'));
    }

    public function store(StorePropietarioRequest $request): RedirectResponse
    {
        Propietario::create($request->validated());
        return redirect()->route('propietarios.index')->with('success', 'Propietario creado exitosamente.');
    }

    public function storeAjax(StorePropietarioRequest $request): JsonResponse
    {
        $propietario = Propietario::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Propietario creado exitosamente.',
            'propietario' => $propietario,
        ]);
    }

    public function update(UpdatePropietarioRequest $request, Propietario $propietario): RedirectResponse
    {
        $propietario->update($request->validated());
        return redirect()->route('propietarios.index')->with('success', 'Propietario actualizado exitosamente.');
    }

    public function destroy( )
    {
        
    }
}

