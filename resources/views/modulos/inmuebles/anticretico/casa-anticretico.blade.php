@extends('layouts.main')
@section('contenido')

    <div class=" min-h-screen py-8 ">
        <h3 class="text-3xl  text-center mb-0 mt-2 text-[#404656] titulo-poppins">INMUBELES EN ANTICRETICO
          </h3>
        <span class="block text-base text-gray-500 text-center mb-8">
            ¡Explora y encuentra tu próximo hogar en nuestra lista de inmuebles disponibles para anticretico!
        </span>
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            @foreach($casas as $casa)
                <div class="bg-[#ffffff] rounded-lg shadow p-3">
                     
                   <div class="relative rounded-lg mb-3 overflow-hidden titulo-poppins">
                        @if($casa->fotos->first())
                            <a href="{{ route('casas.show', $casa->id) }}" class="block">
                                <img src="{{ asset('storage/' . ltrim($casa->fotos->first()->ruta_imagen, '/')) }}"
                                     alt="Foto casa"
                                     class="w-full h-68 object-cover rounded-lg">
                            </a>
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">Sin imagen</div>
                        @endif

                        @if( strtolower($casa->estado) !== 'disponible' )
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
                        <span class="inline-block bg-[#f09e02] text-white text-xs px-3 py-1 font-bold rounded-full mb-2">En
                            {{ ucfirst($casa->tipo) }}</span>

                        <!-- Título y dirección -->
                        <h3 class="font-bold text-lg text-[#404656] mb-1"> {{ mb_strtoupper($casa->titulo) }} EN
                            {{ mb_strtoupper($casa->tipo) }}
                        </h3>
                        <p class="text-sm text-gray-500 mb-2"><i class="fas fa-map-marker-alt text-gray-600 mr-1"></i>{{ mb_strtoupper($casa->direccion) }}</p>
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

                    <!-- Precio -->
                    <div class="text-2xl font-bold text-[#404656] mb-2">{{ number_format($casa->precio, 0, ',', '.') }} $us
                        <span class="text-base font-normal text-gray-500">T.C. 7 Bs</span>
                    </div>

                    <!-- Características -->
                    <div class="flex items-center justify-between text-sm border-t border-t-[#404656] pt-3 mt-3">
                        <div class="flex items-center gap-1">
                            <i class="fas fa-store mr-1 text-gray-600"></i>
                            {{ $casa->tiendas }} Tiendas
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-bed mr-1 text-gray-600"></i>
                            {{ $casa->habitaciones }} Hab.
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-shower mr-1 text-gray-600"></i>
                            {{ $casa->banos }} Baño
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
@endsection
<style>
    .titulo-poppins {
        font-family: 'Poppins', Arial, sans-serif;
    }
    
    .text-overlay {
        background: rgba(0,0,0,0.35); 
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
        background: #e11d48; /* rojo */
        color: #fff;
        font-weight: 800;
        padding: 8px 110px;
        font-size: 1.05rem;
        box-shadow: 0 6px 20px rgba(0,0,0,0.18);
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
        .text-overlay .text-xl { font-size: 1rem; }
    }
</style>