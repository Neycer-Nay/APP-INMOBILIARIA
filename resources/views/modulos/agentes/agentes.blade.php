@extends('layouts.main')

@section('contenido')

    <div class="min-h-screen py-8 ">
        <h3 class="text-3xl text-center mb-0 mt-2 text-[#404656] titulo-poppins">NUESTROS AGENTES</h3>
        <span class="block text-base text-[#404656] text-center mb-8">
            ¡Conoce a nuestro equipo de agentes inmobiliarios profesionales!
        </span>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
            @foreach($agentes as $agente)
                <div class="bg-[#ffffff] rounded-2xl shadow-lg p-8 flex flex-col items-center border-2 border-[#e0e0e0]">
                    <!-- Foto del agente en círculo -->
                    <div class="relative mb-4">
                        @if($agente->foto)
                            <img src="{{ asset('storage/' . ltrim($agente->foto, '/')) }}" alt="Foto de {{ $agente->user->name }}"
                                class="w-40 h-40 rounded-full object-cover ">
                        @else
                            <div class="w-40 h-40 rounded-full bg-gray-200 flex items-center justify-center border-8 border-[#2dcdb1]">
                                <i class="fas fa-user text-5xl text-gray-400"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Nombre del agente -->
                    <h3 class="font-bold text-xl text-[#404656] mb-2 text-center">
                        {{ strtoupper($agente->user->name) }}
                    </h3>

                    <!-- Botón ver agente -->
                    <a href="{{ route('agentes.ver', $agente->id) }}"
                        class="w-32 bg-[#f09e02] hover:bg-[#1bb89e] text-white font-bold py-1 rounded-full transition duration-300 text-lg mb-6 mt-2 text-center">
                        Ver Agente
                    </a>

                    <div class="w-full flex flex-col items-center mt-2">
                        <div class="w-full flex items-center justify-center">
                            <hr class="flex-grow border-t border-[#404656]">
                        </div>
                        <div class="flex flex-col items-center mt-2">
                            <span class="text-white text-sm mb-1">Seguir en</span>
                            <a href="https://wa.me/{{ $agente->telefono ?? '' }}" target="_blank" class="bg-white rounded-full p-3 shadow hover:bg-[#e0e0e0] transition">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="w-7 h-7">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($agentes->isEmpty())
            <div class="text-center py-12">
                <p class="text-gray-200 text-lg">No hay agentes disponibles en este momento.</p>
            </div>
        @endif
    </div>

@endsection

<style>
    .titulo-poppins {
        font-family: 'Poppins', Arial, sans-serif;
    }
</style>
