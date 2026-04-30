@extends('layouts.main')

@section('contenido')

    <div class="min-h-screen py-8 bg-[#f5f7fb]">
        <h3 class="text-3xl text-center mb-0 mt-2 text-[#404656] titulo-poppins">NUESTRO AGENTE</h3>
        <span class="block text-base text-gray-500 text-center mb-8">
            ¡Conoce a tu agente inmobiliario de confianza!
        </span>

        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Panel del agente (fijo al hacer scroll) -->
            <aside class="lg:col-span-4">
                <div class="lg:sticky lg:top-8">
                    <div class="bg-[#ffffff] rounded-2xl shadow p-5">
                        <div class="relative rounded-2xl overflow-hidden mb-5">
                            @if($agente->foto)
                                <img src="{{ asset('storage/' . ltrim($agente->foto, '/')) }}" alt="Foto de {{ $agente->user->name }}"
                                    class="w-full h-auto object-cover">
                            @else
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-user text-6xl text-gray-400"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-[#404656] via-transparent to-transparent opacity-80"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <h3 class="font-bold text-lg">
                                    {{ strtoupper($agente->user->name) }}
                                </h3>
                                <p class="text-sm">Agente de Contacto</p>
                            </div>
                        </div>

                        @php($whats = $agente->telefono ? preg_replace('/\\D+/', '', $agente->telefono) : '')

                        <div class="space-y-3">
                            @if($agente->telefono)
                                <div class="flex items-center justify-between gap-3 border-b border-[#e6e8ee] pb-3">
                                    <div class="flex items-center gap-3 text-[#404656]">
                                        <span class="h-9 w-9 rounded-full border border-[#f09e02] flex items-center justify-center">
                                            <i class="fas fa-phone text-[#f09e02]"></i>
                                        </span>
                                        <span class="font-semibold">Teléfono</span>
                                    </div>
                                    <a href="tel:{{ $agente->telefono }}" class="text-[#404656] hover:underline">
                                        {{ $agente->telefono }}
                                    </a>
                                </div>
                            @endif

                            @if($agente->user->email)
                                <div class="flex items-center justify-between gap-3 border-b border-[#e6e8ee] pb-3">
                                    <div class="flex items-center gap-3 text-[#404656]">
                                        <span class="h-9 w-9 rounded-full border border-[#f09e02] flex items-center justify-center">
                                            <i class="fas fa-envelope text-[#f09e02]"></i>
                                        </span>
                                        <span class="font-semibold">Correo</span>
                                    </div>
                                    <a href="mailto:{{ $agente->user->email }}" class="text-[#404656] hover:underline break-all">
                                        {{ $agente->user->email }}
                                    </a>
                                </div>
                            @endif
                        </div>

                        @if($agente->telefono)
                            <a href="https://wa.me/{{ $whats }}" target="_blank" rel="noopener noreferrer"
                                class="mt-5 inline-flex w-full items-center justify-center gap-2 bg-[#f09e02] hover:bg-[#d88a01] text-white font-semibold py-3 rounded-full transition">
                                <i class="fab fa-whatsapp"></i>
                                Enviar Whatsapp
                            </a>
                        @endif
                    </div>
                </div>
            </aside>

            <!-- Casas del agente (a la derecha) -->
            <section class="lg:col-span-8">
                <h3 class="text-2xl text-center lg:text-left mb-2 text-[#404656] titulo-poppins">
                    INMUEBLES DE {{ mb_strtoupper($agente->user->name) }}
                </h3>
                <span class="block text-base text-gray-500 text-center lg:text-left mb-6">
                    ¡Explora los inmuebles gestionados por este agente!
                </span>

                @if($casas->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($casas as $casa)
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

                    <div class="mt-8">
                        {{ $casas->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-gray-500 text-lg">Este agente no tiene inmuebles asignados actualmente.</p>
                    </div>
                @endif
            </section>
        </div>
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
