<?php

namespace App\Http\Controllers;

use App\Models\Agente;
use App\Models\Casa;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function ventasPorAgente(Request $request)
    {
        $user = $request->user();
        $agenteActual = $user ? $user->agente : null;

        $agentesQuery = Agente::with('user');
        if ($agenteActual) {
            $agentesQuery->where('id', $agenteActual->id);
        }
        $agentes = $agentesQuery->get();

        $filtros = [
            'agente_id' => $agenteActual ? $agenteActual->id : $request->input('agente_id'),
            'fecha_desde' => $request->input('fecha_desde'),
            'fecha_hasta' => $request->input('fecha_hasta'),
        ];

        $mostrarTabla = $request->has('consultar');
        $ventas = collect();

        if ($mostrarTabla) {
            $ventasQuery = Venta::with(['casa', 'agente.user', 'cliente'])
                ->orderBy('fecha_venta', 'desc');

            if (!empty($filtros['agente_id'])) {
                $ventasQuery->where('agente_id', $filtros['agente_id']);
            }

            if (!empty($filtros['fecha_desde'])) {
                $ventasQuery->whereDate('fecha_venta', '>=', $filtros['fecha_desde']);
            }

            if (!empty($filtros['fecha_hasta'])) {
                $ventasQuery->whereDate('fecha_venta', '<=', $filtros['fecha_hasta']);
            }

            $ventas = $ventasQuery->get();
        }

        return view('Admin.reportes.reporte-ventas', compact('agentes', 'ventas', 'mostrarTabla', 'filtros', 'agenteActual'));
    }

    public function ventasPorAgentePdf(Request $request)
    {
        $user = $request->user();
        $agenteActual = $user ? $user->agente : null;
        $agenteId = $agenteActual ? $agenteActual->id : $request->input('agente_id');

        $filtros = [
            'agente_id' => $agenteId,
            'fecha_desde' => $request->input('fecha_desde'),
            'fecha_hasta' => $request->input('fecha_hasta'),
        ];

        $ventasQuery = Venta::with(['casa', 'agente.user', 'cliente'])
            ->orderBy('fecha_venta', 'desc');

        if (!empty($filtros['agente_id'])) {
            $ventasQuery->where('agente_id', $filtros['agente_id']);
        }

        if (!empty($filtros['fecha_desde'])) {
            $ventasQuery->whereDate('fecha_venta', '>=', $filtros['fecha_desde']);
        }

        if (!empty($filtros['fecha_hasta'])) {
            $ventasQuery->whereDate('fecha_venta', '<=', $filtros['fecha_hasta']);
        }

        $ventas = $ventasQuery->get();

        $agenteSeleccionado = null;
        if (!empty($filtros['agente_id'])) {
            $agente = Agente::with('user')->find($filtros['agente_id']);
            $agenteSeleccionado = $agente && $agente->user ? $agente->user->name : null;
        }

        $pdf = Pdf::loadView('Admin.reportes.reporte-ventas-pdf', compact('ventas', 'filtros', 'agenteSeleccionado'));

        return $pdf->stream('reporte-ventas.pdf');
    }

    public function propiedadesDisponibles(Request $request)
    {
        $user = $request->user();
        $agenteActual = $user ? $user->agente : null;

        $tipos = [
            'venta' => 'Venta',
            'alquiler' => 'Alquiler',
            'anticretico' => 'Anticretico',
            'traspaso' => 'Traspaso',
        ];

        $filtros = [
            'tipo' => $request->input('tipo'),
        ];

        $mostrarTabla = $request->has('consultar');
        $casas = collect();

        if ($mostrarTabla) {
            $casasQuery = Casa::with(['agente.user'])
                ->where('estado', 'disponible')
                ->orderBy('created_at', 'desc');

            if ($agenteActual) {
                $casasQuery->where('agente_id', $agenteActual->id);
            }

            if (!empty($filtros['tipo'])) {
                $casasQuery->where('tipo', $filtros['tipo']);
            }

            $casas = $casasQuery->get();
        }

        return view('Admin.reportes.reporte-propiedades-disponible', compact('tipos', 'filtros', 'mostrarTabla', 'casas'));
    }

    public function propiedadesDisponiblesPdf(Request $request)
    {
        $user = $request->user();
        $agenteActual = $user ? $user->agente : null;

        $tipos = [
            'venta' => 'Venta',
            'alquiler' => 'Alquiler',
            'anticretico' => 'Anticretico',
            'traspaso' => 'Traspaso',
        ];

        $filtros = [
            'tipo' => $request->input('tipo'),
        ];

        $casasQuery = Casa::with(['agente.user'])
            ->where('estado', 'disponible')
            ->orderBy('created_at', 'desc');

        if ($agenteActual) {
            $casasQuery->where('agente_id', $agenteActual->id);
        }

        if (!empty($filtros['tipo'])) {
            $casasQuery->where('tipo', $filtros['tipo']);
        }

        $casas = $casasQuery->get();
        $tipoSeleccionado = $filtros['tipo'] ? ($tipos[$filtros['tipo']] ?? 'Todos') : 'Todos';

        $pdf = Pdf::loadView('Admin.reportes.reporte-propiedades-disponible-pdf', compact('casas', 'filtros', 'tipoSeleccionado', 'tipos'));

        return $pdf->stream('reporte-propiedades-disponibles.pdf');
    }
}
