@extends('layouts.main')

@section('contenido')

    <div class="min-h-screen py-8">
        <h3 class="text-3xl text-center mb-0 mt-2 text-[#404656] titulo-poppins">NUESTROS AGENTES</h3>
        <span class="block text-base text-gray-500 text-center mb-8">
            ¡Conoce a nuestro equipo de agentes inmobiliarios profesionales!
        </span>
        
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 px-4">
            @foreach($agentes as $agente)
                <div class="bg-[#ffffff] rounded-lg shadow p-4 flex flex-col items-center">
                    <!-- Foto del agente en círculo -->
                    <div class="relative mb-4">
                        @if($agente->foto)
                            <img src="{{ asset('storage/' . ltrim($agente->foto, '/')) }}" alt="Foto de {{ $agente->user->name }}"
                                class="w-32 h-32 rounded-full object-cover border-4 border-[#f09e02]">
                        @else
                            <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center border-4 border-[#f09e02]">
                                <i class="fas fa-user text-4xl text-gray-400"></i>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Nombre del agente -->
                    <h3 class="font-bold text-lg text-[#404656] mb-1 text-center">
                        {{ $agente->user->name }}
                    </h3>
                    
                    <!-- Botón ver agente -->
                    <a href="{{ route('agentes.ver', $agente->id) }}"
                        class="inline-block bg-[#f09e02] hover:bg-[#d88a01] text-white font-bold py-2 px-6 rounded-full transition duration-300 mt-2">
                        Ver Agente
                    </a>
                </div>
            @endforeach
        </div>
        
        @if($agentes->isEmpty())
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No hay agentes disponibles en este momento.</p>
            </div>
        @endif
    </div>

@endsection

<style>
    .titulo-poppins {
        font-family: 'Poppins', Arial, sans-serif;
    }
</style>
