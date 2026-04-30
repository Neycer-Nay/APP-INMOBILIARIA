@extends('layouts.main')

@section('contenido')

    <div class="min-h-screen py-8">
        <h3 class="text-3xl text-center mb-0 mt-2 text-[#404656] titulo-poppins">NUESTRO AGENTE</h3>
        <span class="block text-base text-gray-500 text-center mb-8">
            ¡Conoce a tu agente inmobiliario de confianza!
        </span>

        <!-- Información del agente -->
        <div class="max-w-7xl mx-auto px-4 mb-12">
            <div class="bg-[#ffffff] rounded-lg shadow p-6 flex flex-col md:flex-row items-center md:items-start gap-8">
                <!-- Foto a la izquierda más grande -->
                <div class="flex-shrink-0">
                    @if($agente->foto)
                        <img src="{{ asset('storage/' . ltrim($agente->foto, '/')) }}" alt="Foto de {{ $agente->user->name }}"
                            class="w-48 h-48 rounded-full object-cover border-4 border-[#f09e02]">
                    @else
                        <div class="w-48 h-48 rounded-full bg-gray-200 flex items-center justify-center border-4 border-[#f09e02]">
                            <i class="fas fa-user text-6xl text-gray-400"></i>
                        </div>
                    @endif
                </div>

                <!-- Información a la derecha de la foto -->
                <div class="flex-grow text-center md:text-left">
                    <h3 class="font-bold text-2xl text-[#404656] mb-4">
                        {{ $agente->user->name }}
                    </h3>

                    <div class="space-y-2">
                        @if($agente->user->email)
                            <p class="text-gray-600">
                                <i class="fas fa-envelope text-[#f09e02] mr-2"></i>
                                <span class="font-semibold">Email:</span>
                                <a href="mailto:{{ $agente->user->email }}" class="text-[#404656] hover:underline">
                                    {{ $agente->user->email }}
                                </a>
                            </p>
                        @endif

                        @if($agente->telefono)
                            <p class="text-gray-600">
                                <i class="fas fa-phone text-[#f09e02] mr-2"></i>
                                <span class="font-semibold">Celular:</span>
                                <a href="tel:{{ $agente->telefono }}" class="text-[#404656] hover:underline">
                                    {{ $agente->telefono }}
                                </a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Casas del agente -->
        @if($agente->casas && $agente->casas->isNotEmpty())
            <div class="max-w-7xl mx-auto px-4">
                <h3 class="text-2xl text-center mb-6 text-[#404656] titulo-poppins">
                    INMUEBLES DE {{ mb_strtoupper($agente->user->name) }}
                </h3>
                <span class="block text-base text-gray-500 text-center mb-8">
                    ¡Explora los inmuebles gestionados por este agente!
                </span>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($agente->casas as $casa)
                        <div class="bg-[#ffffff] rounded-lg shadow p-3">
                            <!-- Imagen principal -->
                            <div class="relative rounded-lg mb-3 overflow-hidden titulo-poppins">
                                @if($casa->fotos->first())
                                    <a href="{{ route('casas.show', $casa->id) }}" class="block">
                                        <img src="{{ asset('storage/' . ltrim($casa->fotos->first()->ruta_imagen, '/')) }}" alt="Foto casa"
                                            class="w-full h-68 object-cover rounded-lg">
                                    </a>
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">Sin imagen</div>
                                @endif

                                @if(strtolower($casa->estado) !== 'disponible')
                                    <div class="estado-badge">
                                        {{ mb_strtoupper($casa->estado) }}
                                    </div>
                                @else
                                    <div class="estado-badge2">
                                        DISPONIBLE
                                    </div>
                                @endif

                            </div>

                            <!-- Etiqueta tipo -->
                            <a href="{{ route('casas.show', $casa->id) }}">
                                <span class="inline-block bg-[#f09e02] text-white text-xs px-3 py-1 font-bold rounded-full mb-2">EN
                                    {{ mb_strtoupper($casa->tipo) }}</span>

                                <!-- Título y dirección -->

                                <h3 class="font-bold text-lg text-[#404656] mb-1">
                                    {{ mb_strtoupper(str_replace('_', ' ', $casa->titulo)) }} EN
                                    {{ mb_strtoupper($casa->tipo) }}
                                </h3>
                                <p class="text-sm text-gray-500 mb-2"><i
                                        class="fas fa-map-marker-alt text-gray-600 mr-1"></i>{{ mb_strtoupper($casa->direccion) }}</p>
                            </a>
                            <!-- Datos principales -->
                            <div class="flex items-center justify-between text-sm mb-2">
                                <div class="flex items-center gap-2">

                                    <span class="font-semibold text-[#404656]">Código:</span>
                                    <span>{{ $casa->codigo }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-[#404656]">Zona:</span>
                                    <span>{{ ucfirst($casa->zona) }}</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between text-sm mb-2">
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-[#404656]">Estado:</span>
                                    <span>{{ ucfirst($casa->estado) }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-[#404656]">Ciudad:</span>
                                    <span>{{ ucfirst($casa->ciudad) }}</span>
                                </div>

                            </div>

                            <!-- Precio anterior -->
                            @if ($casa->precioAnterior && $casa->precioAnterior > $casa->precio)
                                <p class="text-sm text-gray-500 line-through mb-1">
                                    Antes: <span class="font-bold">${{ number_format($casa->precioAnterior, 0, ',', '.') }}</span>
                                </p>
                            @endif

                            <!-- Precio actual -->
                            <div class="text-2xl font-bold text-[#404656] mb-2">
                                {{ number_format($casa->precio, 0, ',', '.') }} $us
                                <span class="text-base font-normal text-gray-500">T.C. 7 Bs</span>
                            </div>

                            <!-- Características -->
                            <div class="flex items-center justify-between text-sm border-t border-t-[#404656] pt-3 mt-3">
                                <div class="flex items-center gap-1">
                                    <i class="fas fa-store mr-1 text-gray-600"></i>
                                    {{ $casa->tiendas }} {{ $casa->tiendas == 1 ? 'Tienda' : 'Tiendas' }}
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fas fa-bed mr-1 text-gray-600"></i>
                                    {{ $casa->habitaciones }} Hab.
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fas fa-shower mr-1 text-gray-600"></i>
                                    {{ $casa->banos }} {{ $casa->banos == 1 ? 'Baño' : 'Baños' }}
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fas fa-ruler-combined mr-2 text-[#404656]"></i>
                                    {{ $casa->superficieConstruida }} mt2
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Este agente no tiene imóveis asignados actualmente.</p>
            </div>
        @endif
    </div>

@endsection

<style>
    .titulo-poppins {
        font-family: 'Poppins', Arial, sans-serif;
    }

    .text-overlay {
        background: rgba(0, 0, 0, 0.35);
        padding: .4rem .8rem;
        border-radius: .35rem;
        max-width: 90%;
        pointer-events: none;
    }

    .estado-badge2 {
        position: absolute;
        top: 32px;
        right: -68px;
        z-index: 30;
        transform: rotate(30deg);
        background: #e09129;
        color: #fff;
        font-weight: 800;
        padding: 8px 110px;
        font-size: 1.05rem;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.18);
        letter-spacing: 1px;
        pointer-events: none;
    }

    .estado-badge {
        position: absolute;
        top: 32px;
        right: -68px;
        z-index: 30;
        transform: rotate(30deg);
        background: #e11d48;
        /* rojo */
        color: #fff;
        font-weight: 800;
        padding: 8px 110px;
        font-size: 1.05rem;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.18);
        letter-spacing: 1px;
        pointer-events: none;
    }

    @media (max-width: 768px) {
        .estado-badge {
            right: -36px;
            padding: 6px 80px;
            font-size: 0.9rem;
            transform: rotate(28deg);
        }

        .text-overlay .text-xl {
            font-size: 1rem;
        }
    }
</style>
