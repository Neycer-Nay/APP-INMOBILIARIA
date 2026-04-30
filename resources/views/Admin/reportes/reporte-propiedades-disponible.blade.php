@extends('Admin.layouts.main')

@section('contenido')
	<div class="max-w-7xl mx-auto py-2 px-2">
		<div class="flex items-center justify-between mb-6">
			<div>
				<h2 class="text-2xl md:text-3xl font-bold text-[#404656] menu-font">Reporte de Propiedades Disponibles</h2>
				<p class="text-gray-500 mt-1 text-sm menu-font">Filtra por tipo de operacion antes de consultar.</p>
			</div>
		</div>

		<div class="bg-white rounded-2xl shadow-sm p-4 md:p-6 mb-6">
			<form method="GET" action="{{ route('reportes.propiedadesDisponibles') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
				<div>
					<label for="tipo" class="block text-sm font-medium text-[#404656] mb-1">Tipo de operacion</label>
					<select id="tipo" name="tipo"
						class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
						<option value="">Todas las operaciones</option>
						@foreach($tipos as $key => $label)
							<option value="{{ $key }}" @selected(($filtros['tipo'] ?? '') == $key)>{{ $label }}</option>
						@endforeach
					</select>
				</div>

				<div class="flex flex-wrap gap-3">
					<button type="submit" name="consultar" value="1"
						class="bg-[#404656] hover:bg-[#2f3442] text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
						Consultar
					</button>
					<button type="submit" formtarget="_blank" formaction="{{ route('reportes.propiedadesDisponibles.pdf') }}"
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
							<th class="px-4 py-3 text-left text-sm font-semibold menu-font">Codigo</th>
							<th class="px-4 py-3 text-left text-sm font-semibold menu-font">Titulo</th>
							<th class="px-4 py-3 text-left text-sm font-semibold menu-font">Operacion</th>
							<th class="px-4 py-3 text-left text-sm font-semibold menu-font">Zona</th>
							<th class="px-4 py-3 text-left text-sm font-semibold menu-font">Ciudad</th>
							<th class="px-4 py-3 text-left text-sm font-semibold menu-font">Precio</th>
							<th class="px-4 py-3 text-left text-sm font-semibold menu-font">Agente</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-gray-200">
						@if(!$mostrarTabla)
							<tr>
								<td colspan="7" class="px-4 py-8 text-center text-gray-500">
									Selecciona un tipo de operacion y presiona Consultar para ver resultados.
								</td>
							</tr>
						@else
							@forelse($casas as $casa)
								<tr class="hover:bg-gray-50 transition-colors">
									<td class="px-4 py-3 text-sm text-[#404656] font-medium">
										{{ $casa->codigo ?? 'N/A' }}
									</td>
									<td class="px-4 py-3 text-sm text-[#404656]">
										{{ $casa->titulo ?? 'N/A' }}
									</td>
									<td class="px-4 py-3 text-sm text-[#404656]">
										{{ $tipos[$casa->tipo] ?? ($casa->tipo ?? 'N/A') }}
									</td>
									<td class="px-4 py-3 text-sm text-[#404656]">
										{{ $casa->zona ?? 'N/A' }}
									</td>
									<td class="px-4 py-3 text-sm text-[#404656]">
										{{ $casa->ciudad ?? 'N/A' }}
									</td>
									<td class="px-4 py-3 text-sm text-[#404656] font-bold">
										${{ number_format($casa->precio ?? 0, 2) }}
									</td>
									<td class="px-4 py-3 text-sm text-[#404656]">
										{{ $casa->agente->user->name ?? 'N/A' }}
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="7" class="px-4 py-8 text-center text-gray-500">
										No hay propiedades disponibles para los filtros seleccionados.
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