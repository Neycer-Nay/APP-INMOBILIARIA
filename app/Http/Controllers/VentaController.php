<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Casa;
use App\Models\Agente;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->agente) {
            $agente = $user->agente;
            // Obtener ventas del agente
            $ventas = Venta::with(['casa', 'casa.propietario'])
                ->where('agente_id', $agente->id)
                ->orderBy('fecha_venta', 'desc')
                ->get();

            // Obtener clientes para el dropdown
            $clientes = Cliente::where('agente_id', $agente->id)
            ->orderBy('nombre')
            ->get();

            $casas = Casa::where('agente_id', $agente->id)
            ->whereDoesntHave('venta')
            ->with('propietario')
            ->get();
        } else {
            // Superadministrador - ver todas las ventas
            $ventas = Venta::with(['casa', 'casa.propietario', 'agente', 'agente.user'])
                ->orderBy('fecha_venta', 'desc')
                ->get();

            $clientes = Cliente::orderBy('nombre')->get();

        // 🔥 Todas las casas
        $casas = Casa::whereDoesntHave('venta')
            ->with('propietario')
            ->get();

            // Obtener clientes para el dropdown
            $clientes = Cliente::orderBy('nombre')->get();
        }

        return view('Admin.transacciones.index', compact('ventas', 'clientes', 'casas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $agente = $user->agente;

        // Obtener casas del agente que NO han sido vendidas
        $casas = Casa::where('agente_id', $agente->id)
            ->whereDoesntHave('venta')
            ->with('propietario')
            ->get();

        return view('Admin.transacciones.create', compact('casas', 'agente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'casa_id' => 'required|exists:casas,id',
            'fecha_venta' => 'required|date',
            'precio_venta' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();
        $agente = $user->agente;

        // Obtener la casa seleccionada
        $casa = Casa::with('propietario')->findOrFail($request->casa_id);

        // Calcular la comisión del agente
        $comisionPorcentaje = $agente->comision_predeterminada ?? 10; // Por defecto 10%
        $montoComision = ($request->precio_venta * $comisionPorcentaje) / 100;

        $estadoMap = [
            'venta' => 'vendido',
            'alquiler' => 'alquilado',
            'anticretico' => 'entregado',
            'traspaso' => 'entregado',
        ];
        $estadoCasa = $estadoMap[$casa->tipo] ?? 'disponible';
        // Crear la venta
        $venta = Venta::create([
            'casa_id' => $request->casa_id,
            'cliente_id' => $request->cliente_id ?? null,
            'agente_id' => $agente->id,
            'fecha_venta' => $request->fecha_venta,
            'precio_venta' => $request->precio_venta,
        ]);

        $casa->update([
            'estado' => $estadoCasa
        ]);


        // Crear detalle de venta con la comisión
        DB::table('detalle_ventas')->insert([
            'venta_id' => $venta->id,
            'propietario_id' => $casa->propietario_id,
            'monto_comision' => $montoComision,
            'porcentaje_comision' => $comisionPorcentaje,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('transacciones.index')
            ->with('success', 'Venta registrada exitosamente. Comisión: ' . number_format($montoComision, 2));
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        $venta->load(['casa', 'casa.propietario', 'agente', 'agente.user']);
        return view('Admin.transacciones.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
