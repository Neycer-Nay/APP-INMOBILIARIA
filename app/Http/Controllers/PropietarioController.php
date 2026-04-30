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
        $user = auth()->user();

        $query = Propietario::query();

        if ($user && $user->rol && $user->rol->nombre === 'agente') {
            $agenteId = optional($user->agente)->id;
            if ($agenteId) {
                $query->where('agente_id', $agenteId);
            } else {
                $query->whereRaw('1 = 0');
            }
        }
        $propietarios = $query->paginate(10);
        return view('Admin.propietarios.index', compact('propietarios'));

    }

    public function store(StorePropietarioRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $user = auth()->user();

        if ($user && $user->rol && $user->rol->nombre === 'agente') {
            $data['agente_id'] = optional($user->agente)->id;
        }

        Propietario::create($data);
        return redirect()->route('propietarios.index')->with('success', 'Propietario creado exitosamente.');
    }

    public function storeAjax(StorePropietarioRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = auth()->user();

        if ($user && $user->rol && $user->rol->nombre === 'agente') {
            $data['agente_id'] = optional($user->agente)->id;
        }

        $propietario = Propietario::create($data);
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

    public function destroy()
    {

    }
}

