@extends('Admin.layouts.main')

@section('contenido')
    <!-- Page Title -->
    <div class="mb-8 flex justify-between items-center">
        <div>
            @if(Auth::user()->agente)
                <h2 class="text-2xl md:text-3xl font-bold text-[#404656] menu-font">
                    Mis Transacciones
                </h2>
                <p class="text-gray-500 mt-1 text-sm menu-font">
                    Casas vendidas y registro de ventas
                </p>
            @else
                <h2 class="text-2xl md:text-3xl font-bold text-[#404656] menu-font">
                    Todas las Transacciones
                </h2>
                <p class="text-gray-500 mt-1 text-sm menu-font">
                    Gestión general de ventas del sistema
                </p>
            @endif
        </div>
        @if(Auth::user()->agente)
        <button onclick="openModal()"
            class="bg-[#e09129] hover:bg-[#d18a1f] text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200 flex items-center gap-2">
            <i class="fas fa-plus"></i>
            Nueva Venta
        </button>
        @endif
    </div>

    <!-- Transactions Table -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#404656] text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Fecha</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Código Casa</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Título</th>
                        @if(!Auth::user()->agente)
                            <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Agente</th>
                        @endif
                        <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Propietario</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Precio Venta</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Comisión</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold menu-font">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
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
                            @if(!Auth::user()->agente)
                                <td class="px-4 py-3 text-sm text-[#404656]">
                                    {{ $venta->agente->user->name ?? 'N/A' }}
                                </td>
                            @endif
                            <td class="px-4 py-3 text-sm text-[#404656]">
                                {{ $venta->casa->propietario->nombre ?? 'N/A' }} {{ $venta->casa->propietario->apellido ?? '' }}
                            </td>
                            <td class="px-4 py-3 text-sm text-[#404656] font-bold">
                                ${{ number_format($venta->precio_venta, 2) }}
                            </td>
                            <td class="px-4 py-3 text-sm text-green-600 font-medium">
                                @if(isset($venta->detalles) && $venta->detalles->count() > 0)
                                    ${{ number_format($venta->detalles->first()->monto_comision, 2) }}
                                    <span
                                        class="text-xs text-gray-500">({{ $venta->detalles->first()->porcentaje_comision }}%)</span>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <button onclick="viewVenta({{ $venta->id }})"
                                    class="text-[#404656] hover:text-[#e09129] transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                No hay transacciones registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Nueva Venta -->
    <div id="ventaModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-4 overflow-hidden">
            <div class="bg-[#404656] px-6 py-4 flex justify-between items-center">
                <h3 class="text-lg font-bold text-white menu-font">Registrar Nueva Venta</h3>
                <button onclick="closeModal()" class="text-white hover:text-gray-300">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="ventaForm" action="{{ route('transacciones.store') }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-4">
                    <!-- Seleccionar Casa -->
                    <div>
                        <label class="block text-sm font-medium text-[#404656] mb-1">Casa a Vender *</label>
                        <select name="casa_id" id="casaSelect" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                            <option value="">Seleccionar casa...</option>
                            @foreach($casas as $casa)
                                <option value="{{ $casa->id }}"
                                    data-propietario="{{ $casa->propietario->nombre ?? '' }} {{ $casa->propietario->apellido ?? '' }}"
                                    data-precio="{{ $casa->precio }}">
                                    {{ $casa->codigo }} - {{ $casa->titulo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Propietario (auto) -->
                    <div>
                        <label class="block text-sm font-medium text-[#404656] mb-1">Propietario</label>
                        <input type="text" id="propietarioDisplay" readonly
                            class="w-full bg-gray-100 border border-gray-300 rounded-lg px-3 py-2 text-gray-500">
                    </div>

                    <!-- Fecha de Venta -->
                    <div>
                        <label class="block text-sm font-medium text-[#404656] mb-1">Fecha de Venta *</label>
                        <input type="date" name="fecha_venta" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                    </div>

                    <!-- Precio de Venta -->
                    <div>
                        <label class="block text-sm font-medium text-[#404656] mb-1">Precio de Venta *</label>
                        <input type="number" name="precio_venta" id="precioVenta" step="0.01" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                    </div>

                    <!-- Cliente (opcional) -->
                    <div>
                        <label class="block text-sm font-medium text-[#404656] mb-1">Cliente (Comprador)</label>
                        <select name="cliente_id"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                            <option value="">Seleccionar cliente...</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido ?? '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Comisión del Agente -->
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-green-700">Comisión del Agente
                                ({{ Auth::user()->agente->comision_predeterminada ?? 10 }}%)</span>
                            <span id="comisionDisplay" class="text-lg font-bold text-green-700">$0.00</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-[#404656] hover:bg-gray-50 transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-[#e09129] hover:bg-[#d18a1f] text-white rounded-lg transition-colors">
                        Registrar Venta
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openModal() {
            document.getElementById('ventaModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('ventaModal').classList.add('hidden');
            document.getElementById('ventaForm').reset();
            document.getElementById('propietarioDisplay').value = '';
            document.getElementById('comisionDisplay').textContent = '$0.00';
        }

        // Auto-fill propietario when selecting casa
        document.getElementById('casaSelect').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const propietario = selectedOption.dataset.propietario || '';
            const precio = selectedOption.dataset.precio || 0;

            document.getElementById('propietarioDisplay').value = propietario;
            document.getElementById('precioVenta').value = precio;

            // Calcular comisión
            calcularComision();
        });

        // Calcular comisión cuando cambia el precio
        document.getElementById('precioVenta').addEventListener('input', calcularComision);

        function calcularComision() {
            const precio = parseFloat(document.getElementById('precioVenta').value) || 0;
            const comisionPorcentaje = {{ Auth::user()->agente->comision_predeterminada ?? 10 }};
            const montoComision = (precio * comisionPorcentaje) / 100;
            document.getElementById('comisionDisplay').textContent = '$' + montoComision.toFixed(2);
        }

        function viewVenta(id) {
            // Mostrar detalles de la venta
            window.location.href = '/admin/transacciones/' + id;
        }
    </script>
@endpush