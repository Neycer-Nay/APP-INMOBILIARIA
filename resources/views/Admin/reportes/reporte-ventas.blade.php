@extends('Admin.layouts.main')

@section('contenido')
    <div class="max-w-7xl mx-auto py-2 px-2">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-[#404656] menu-font">Reporte de Ventas</h2>
                <p class="text-gray-500 mt-1 text-sm menu-font">Filtra por agente y fecha antes de consultar.</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6 mb-6">
            <form method="GET" action="{{ route('reportes.ventasPorAgente') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                @if($agenteActual)
                    <div>
                        <label class="block text-sm font-medium text-[#404656] mb-1">Agente</label>
                        <div class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50 text-[#404656]">
                            {{ $agenteActual->user->name ?? 'Agente' }}
                        </div>
                        <input type="hidden" name="agente_id" value="{{ $agenteActual->id }}">
                    </div>
                @else
                    <div>
                        <label for="agente_id" class="block text-sm font-medium text-[#404656] mb-1">Agente</label>
                        <select id="agente_id" name="agente_id"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                            <option value="">Todos los agentes</option>
                            @foreach($agentes as $agente)
                                <option value="{{ $agente->id }}" @selected(($filtros['agente_id'] ?? '') == $agente->id)>
                                    {{ $agente->user->name ?? 'Agente #' . $agente->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div>
                    <label for="fecha_desde" class="block text-sm font-medium text-[#404656] mb-1">Fecha desde</label>
                    <input type="date" id="fecha_desde" name="fecha_desde"
                        value="{{ $filtros['fecha_desde'] ?? '' }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                </div>

                <div>
                    <label for="fecha_hasta" class="block text-sm font-medium text-[#404656] mb-1">Fecha hasta</label>
                    <input type="date" id="fecha_hasta" name="fecha_hasta"
                        value="{{ $filtros['fecha_hasta'] ?? '' }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                </div>

                <div class="flex flex-wrap gap-3">
                    <button type="submit" name="consultar" value="1"
                        class="bg-[#404656] hover:bg-[#2f3442] text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                        Consultar
                    </button>
                    <button type="submit" formtarget="_blank" formaction="{{ route('reportes.ventasPorAgente.pdf') }}"
                        class="bg-[#e09129] hover:bg-[#d18a1f] text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                        Generar PDF
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-[#404656] text-white">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Fecha</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Codigo Casa</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Titulo</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Agente</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Cliente</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Precio Venta</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @if(!$mostrarTabla)
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                    Selecciona filtros y presiona Consultar para ver resultados.
                                </td>
                            </tr>
                        @else
                            @forelse($ventas as $venta)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-3 text-sm text-[#404656]">
                                        {{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y') }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-[#404656] font-medium">
                                        {{ $venta->casa->codigo ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-[#404656]">
                                        {{ $venta->casa->titulo ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-[#404656]">
                                        {{ $venta->agente->user->name ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-[#404656]">
                                        {{ $venta->cliente->nombre ?? 'N/A' }} {{ $venta->cliente->apellido ?? '' }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-[#404656] font-bold">
                                        ${{ number_format($venta->precio_venta, 2) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                        No hay ventas con los filtros seleccionados.
                                    </td>
                                </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection