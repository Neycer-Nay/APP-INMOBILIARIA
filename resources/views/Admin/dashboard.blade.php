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
                    <p class="text-3xl font-bold text-[#404656] mt-1 menu-font">0</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-[#e09129]/15 flex items-center justify-center text-[#e09129]">
                    <i class="fas fa-building text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 font-medium"><i class="fas fa-arrow-up mr-1"></i>0%</span>
                <span class="text-gray-400 ml-2 menu-font">vs mes anterior</span>
            </div>
        </div>

        <!-- Propietarios -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-[#404656] hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 menu-font uppercase tracking-wider">Propietarios</p>
                    <p class="text-3xl font-bold text-[#404656] mt-1 menu-font">0</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-[#404656]/15 flex items-center justify-center text-[#404656]">
                    <i class="fas fa-user-tie text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 font-medium"><i class="fas fa-arrow-up mr-1"></i>0%</span>
                <span class="text-gray-400 ml-2 menu-font">vs mes anterior</span>
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
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 font-medium"><i class="fas fa-arrow-up mr-1"></i>0%</span>
                <span class="text-gray-400 ml-2 menu-font">vs mes anterior</span>
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
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 font-medium"><i class="fas fa-arrow-up mr-1"></i>0%</span>
                <span class="text-gray-400 ml-2 menu-font">vs mes anterior</span>
            </div>
        </div>
    </div>

    <!-- Secondary Stats + Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Usuarios Card -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-purple-600 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 menu-font uppercase tracking-wider">Usuarios</p>
                    <p class="text-3xl font-bold text-[#404656] mt-1 menu-font">0</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-600/15 flex items-center justify-center text-purple-600">
                    <i class="fas fa-user-shield text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-gray-400 menu-font">Administradores del sistema</span>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-[#404656] mb-4 menu-font">Accesos Rápidos</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('casas.create') }}" class="flex flex-col items-center justify-center p-4 rounded-xl bg-[#e09129]/10 text-[#e09129] hover:bg-[#e09129] hover:text-white transition-colors duration-200 group">
                    <i class="fas fa-plus-circle text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-semibold menu-font text-center">Nueva Casa</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center p-4 rounded-xl bg-[#404656]/10 text-[#404656] hover:bg-[#404656] hover:text-white transition-colors duration-200 group">
                    <i class="fas fa-user-plus text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-semibold menu-font text-center">Nuevo Propietario</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center p-4 rounded-xl bg-green-600/10 text-green-600 hover:bg-green-600 hover:text-white transition-colors duration-200 group">
                    <i class="fas fa-user-check text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-semibold menu-font text-center">Nuevo Cliente</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center p-4 rounded-xl bg-blue-600/10 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors duration-200 group">
                    <i class="fas fa-file-contract text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                    <span class="text-sm font-semibold menu-font text-center">Registrar Venta</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity Placeholder -->
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-[#404656] menu-font">Actividad Reciente</h3>
            <span class="text-xs px-3 py-1 rounded-full bg-gray-100 text-gray-500 menu-font">Últimos 7 días</span>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-[#404656] text-white">
                    <tr>
                        <th class="py-3 px-4 rounded-l-lg menu-font">Acción</th>
                        <th class="py-3 px-4 menu-font">Entidad</th>
                        <th class="py-3 px-4 menu-font">Usuario</th>
                        <th class="py-3 px-4 menu-font">Fecha</th>
                        <th class="py-3 px-4 rounded-r-lg menu-font">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-3 px-4 text-gray-700 menu-font">Registro</td>
                        <td class="py-3 px-4 text-gray-700 menu-font">Casa</td>
                        <td class="py-3 px-4 text-gray-700 menu-font">Admin</td>
                        <td class="py-3 px-4 text-gray-500 menu-font">--</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 menu-font">Completado</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-3 px-4 text-gray-700 menu-font">Actualización</td>
                        <td class="py-3 px-4 text-gray-700 menu-font">Propietario</td>
                        <td class="py-3 px-4 text-gray-700 menu-font">Admin</td>
                        <td class="py-3 px-4 text-gray-500 menu-font">--</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700 menu-font">Pendiente</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-3 px-4 text-gray-700 menu-font">Venta</td>
                        <td class="py-3 px-4 text-gray-700 menu-font">Inmueble</td>
                        <td class="py-3 px-4 text-gray-700 menu-font">Admin</td>
                        <td class="py-3 px-4 text-gray-500 menu-font">--</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700 menu-font">En proceso</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

