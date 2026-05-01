@extends('Admin.layouts.main')

@section('contenido')
    <!-- Page Title -->
    <div class="mb-8">
        <h2 class="text-2xl md:text-3xl font-bold text-[#404656] menu-font">Dashboard</h2>
        <p class="text-gray-500 mt-1 text-sm menu-font">Resumen general del sistema inmobiliario</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Casas -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-[#e09129] hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 menu-font uppercase tracking-wider">Total Casas</p>
                    <p class="text-3xl font-bold text-[#404656] mt-1 menu-font">{{ $totalCasas }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-[#e09129]/15 flex items-center justify-center text-[#e09129]">
                    <i class="fas fa-building text-xl"></i>
                </div>
            </div>
            
        </div>

        <!-- Propietarios -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-[#404656] hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 menu-font uppercase tracking-wider">Propietarios</p>
                    <p class="text-3xl font-bold text-[#404656] mt-1 menu-font">{{ $totalPropietarios }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-[#404656]/15 flex items-center justify-center text-[#404656]">
                    <i class="fas fa-user-tie text-xl"></i>
                </div>
            </div>
            
        </div>

        <!-- Clientes -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-green-600 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 menu-font uppercase tracking-wider">Clientes</p>
                    <p class="text-3xl font-bold text-[#404656] mt-1 menu-font">0</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-green-600/15 flex items-center justify-center text-green-600">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>
            
        </div>

        <!-- Ventas -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-blue-600 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 menu-font uppercase tracking-wider">Ventas</p>
                    <p class="text-3xl font-bold text-[#404656] mt-1 menu-font">0</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-600/15 flex items-center justify-center text-blue-600">
                    <i class="fas fa-handshake text-xl"></i>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Secondary Stats + Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        @if($esSuperAdministrador)
            <!-- Usuarios Card - Solo visible para SuperAdministrador -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-purple-600 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 menu-font uppercase tracking-wider">Agentes</p>
                        <p class="text-3xl font-bold text-[#404656] mt-1 menu-font">{{ $totalAgentes }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-purple-600/15 flex items-center justify-center text-purple-600">
                        <i class="fas fa-user-shield text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-gray-400 menu-font">Agentes registrados</span>
                </div>
            </div>
        @else
            <!-- Mi Cartera Card - Visible para Agente -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-purple-600 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 menu-font uppercase tracking-wider">Mi Cartera</p>
                        <p class="text-3xl font-bold text-[#404656] mt-1 menu-font">{{ $totalCasas }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-purple-600/15 flex items-center justify-center text-purple-600">
                        <i class="fas fa-home text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-gray-400 menu-font">Mis propiedades</span>
                </div>
            </div>
        @endif

        <!-- Quick Actions 
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-[#404656] mb-4 menu-font">Accesos Rápidos</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('casas.create') }}"
                    class="flex flex-col items-center justify-center p-4 rounded-xl bg-[#e09129]/10 text-[#e09129] hover:bg-[#e09129] hover:text-white transition-colors duration-200 group">
                    <i class="fas fa-plus-circle text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-semibold menu-font text-center">Nueva Casa</span>
                </a>
                <a href="#"
                    class="flex flex-col items-center justify-center p-4 rounded-xl bg-[#404656]/10 text-[#404656] hover:bg-[#404656] hover:text-white transition-colors duration-200 group">
                    <i class="fas fa-user-plus text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-semibold menu-font text-center">Nuevo Propietario</span>
                </a>
                <a href="#"
                    class="flex flex-col items-center justify-center p-4 rounded-xl bg-green-600/10 text-green-600 hover:bg-green-600 hover:text-white transition-colors duration-200 group">
                    <i class="fas fa-user-check text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-semibold menu-font text-center">Nuevo Cliente</span>
                </a>
                <a href="#"
                    class="flex flex-col items-center justify-center p-4 rounded-xl bg-blue-600/10 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors duration-200 group">
                    <i class="fas fa-file-contract text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-semibold menu-font text-center">Registrar Venta</span>
                </a>
            </div>
        </div>-->
    </div>



@endsection