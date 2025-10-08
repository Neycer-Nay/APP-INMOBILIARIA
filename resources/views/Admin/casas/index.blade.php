@extends('layouts.main')

@section('contenido')
<div class="max-w-7xl mx-auto py-8 px-2">
    <h2 class="text-2xl font-bold text-[#404656] mb-6 text-center">Listado de Casas</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($casas as $casa)
            <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                <a href="{{ route('casas.show', $casa->id) }}">
                    @if($casa->fotos && $casa->fotos->first())
                        <img src="{{ asset('storage/' . ltrim($casa->fotos->first()->ruta_imagen, '/')) }}"
                             alt="Foto casa"
                             class="w-full h-56 object-cover rounded mb-3">
                    @else
                        <div class="w-full h-56 bg-gray-200 rounded flex items-center justify-center text-gray-400">
                            Sin imagen
                        </div>
                    @endif
                </a>
                <h3 class="font-bold text-lg text-[#404656] mb-1 mt-2">
                    {{ mb_strtoupper($casa->categoria) }} EN {{ mb_strtoupper($casa->tipo) }}
                </h3>
                <p class="text-sm text-gray-500 mb-1">
                    <i class="fas fa-map-marker-alt mr-1 text-gray-600"></i>
                    {{ mb_strtoupper($casa->zona) }} - {{ mb_strtoupper($casa->direccion) }}
                </p>
                <span class="block text-gray-500 text-sm mb-1">
                    <i class="fas fa-barcode mr-1 text-gray-600"></i>
                    Código: {{ $casa->codigo }}
                </span>
                <span class="text-xl font-bold text-[#404656] mb-2">
                    {{ number_format($casa->precio, 0, ',', '.') }}
                    {{ $casa->tipo == 'alquiler' ? 'Bs' : '$us' }}
                </span>
                <div class="flex flex-wrap gap-4 text-sm text-gray-700 mt-auto">
                    <span><i class="fas fa-bed mr-1"></i> {{ $casa->habitaciones }} hab.</span>
                    <span><i class="fas fa-shower mr-1"></i> {{ $casa->banos }} baños</span>
                    <span><i class="fas fa-warehouse mr-1"></i> {{ $casa->garajes }} garajes</span>
                </div>
                <a href="{{ route('casas.show', $casa->id) }}"
                   class="mt-4 bg-[#404656] text-white py-2 px-4 rounded hover:bg-[#2c3240] text-center">
                    Ver detalles
                </a>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500">
                No hay casas registradas.
            </div>
        @endforelse
    </div>
</div>
@endsection