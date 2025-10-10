@extends('layouts.main')

@section('contenido')
    <h2 class="text-2xl font-bold mb-4">Resultados de la búsqueda</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($casas as $casa)
            <div class="border rounded-lg p-4 shadow">
                <h3 class="font-bold">{{ $casa->titulo }}</h3>
                <p>{{ $casa->direccion }}</p>
                <p>Zona: {{ ucfirst($casa->zona) }}</p>
                <p>Tipo: {{ ucfirst($casa->tipo) }}</p>
                <p>Precio: {{ number_format($casa->precio, 2) }}</p>
                <a href="{{ route('casas.show', $casa->id) }}" class="text-blue-500">Ver detalles</a>
            </div>
        @empty
            <p>No se encontraron resultados.</p>
        @endforelse
    </div>
@endsection