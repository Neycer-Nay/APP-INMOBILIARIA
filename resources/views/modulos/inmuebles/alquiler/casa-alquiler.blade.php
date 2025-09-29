@extends('layouts.main')
@section('contenido')

    <div class=" min-h-screen py-8">
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($casas as $casa)
                <div class="bg-[white] rounded-xl shadow p-4">
                    <!-- Imagen principal -->
                    @if($casa->fotos->first())
                        <img src="{{ asset('storage/' . ltrim($casa->fotos->first()->ruta_imagen, '/')) }}" alt="Foto casa"
                            class="w-full h-48 object-cover rounded-lg mb-3">
                    @else
                        <div class="w-full h-48 bg-gray-200 rounded-lg mb-3 flex items-center justify-center text-gray-400">Sin
                            imagen</div>
                    @endif

                    <!-- Etiqueta tipo -->
                    <span
                        class="inline-block bg-gray-400 text-white text-xs px-3 py-1 rounded mb-2">{{ ucfirst($casa->tipo) }}</span>

                    <!-- Título y dirección -->
                    <h3 class="font-bold text-lg text-[#404656] mb-1"> {{ ucfirst($casa->categoria) }} En
                        {{ ucfirst($casa->tipo) }}</h3>
                    <p class="text-sm text-gray-500 mb-2">{{ $casa->direccion }}, {{ $casa->ciudad }}</p>

                    <!-- Datos principales -->
                    <div class="flex items-center justify-between text-sm mb-2">
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-[#404656]">Código:</span>
                            <span>{{ $casa->codigo }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-[#404656]">Zona:</span>
                            <span>{{ $casa->zona }}</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm mb-2">
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-[#404656]">Estado:</span>
                            <span>{{ ucfirst($casa->estado) }}</span>
                        </div>
                        <a href="#" class="text-gray-600 hover:underline flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M5 15l7-7 7 7"></path>
                            </svg>
                            Añadir a Favoritos
                        </a>
                    </div>

                    <!-- Precio -->
                    <div class="text-2xl font-bold text-[#404656] mb-2">{{ number_format($casa->precio, 0, ',', '.') }} Bs <span
                            class="text-base font-normal text-gray-500">/Mensual</span></div>

                    <!-- Características -->
                    <div class="flex items-center justify-between text-sm border-t pt-3 mt-3">
                        <div class="flex items-center gap-1">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            {{ $casa->habitaciones }} Hab.
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M7 10v6a2 2 0 002 2h6a2 2 0 002-2v-6"></path>
                            </svg>
                            {{ $casa->banos }} Baño
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6"></path>
                            </svg>
                            {{ $casa->superficieConstruida }} mt2
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection