<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agente;
use App\Models\Propietario;
use App\Models\Cliente;
use App\Models\Venta;
use App\Models\User;
use App\Models\Casa;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Inicializar variables por defecto
        $totalCasas = 0;
        $totalPropietarios = 0;
        $totalClientes = 0;
        $totalVentas = 0;
        $totalAgentes = 0;
        $totalUsuarios = 0;
        
        // Verificar el rol del usuario
        $esSuperAdministrador = false;
        if ($user && $user->rol) {
            // Comparar en minúsculas para evitar problemas de mayúsculas/minúsculas
            $esSuperAdministrador = strtolower($user->rol->nombre) === 'superadministrador';
        }
        
        if ($esSuperAdministrador) {
            // SUPERADMINISTRADOR: ver totales de todo el sistema
            $totalCasas = Casa::count();
            $totalPropietarios = Propietario::count();
            /*$totalClientes = Cliente::count();
            $totalVentas = Venta::count();*/
            $totalAgentes = Agente::count();
            $totalUsuarios = User::count();
        } elseif ($user && $user->agente) {
            // AGENTE: ver solo sus datos
            $agente = $user->agente;
            
            // Total de casas del agente
            $totalCasas = $agente->casas()->count();
            
            // Total de propietarios únicos relacionados con las casas del agente
            $totalPropietarios = $agente->casas()
                ->distinct('propietario_id')
                ->count('propietario_id');
            
            // Total de clientes del agente
            //$totalClientes = Cliente::where('agente_id', $agente->id)->count();
            
            // Total de ventas del agente
            //$totalVentas = $agente->ventas()->count();
        }
        
        return view('Admin.dashboard', compact(
            'totalCasas',
            'totalPropietarios', 
            'totalClientes',
            'totalVentas',
            'totalAgentes',
            'totalUsuarios',
            'esSuperAdministrador'
        ));
    }
}
