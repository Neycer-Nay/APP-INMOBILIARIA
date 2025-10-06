@extends('layouts.main')
@section('contenido')
    <!-- Galería de fotos -->
    <div class="mb-6">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($casa->fotos as $foto)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . ltrim($foto->ruta_imagen, '/')) }}" alt="Foto casa"
                            class="w-full h-64 md:h-[600px] object-cover rounded">
                    </div>
                @endforeach
            </div>
            <!-- Flechas de navegación -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Paginación -->
            <div class="swiper-pagination"></div>
        </div>

    </div>
    <div class="max-w-7xl mx-auto py-8 px-2 grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Columna principal (2/3) -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Tarjeta: Título, código y precio -->
            <div class=" rounded-lg  p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-[#404656] mb-2">
                        {{ mb_strtoupper($casa->categoria) }} EN {{ mb_strtoupper($casa->tipo) }}
                    </h2>
                    <p class="text-1xl font-bold text-[#404656] mb-2">
                        <i class="fas fa-map-marker-alt mr-1 text-gray-600"></i>
                        ZONA {{ mb_strtoupper($casa->zona) }} {{ mb_strtoupper($casa->direccion) }}
                    </p>

                    <span class="block text-gray-500 text-sm mb-1"><i class="fas fa-barcode mr-1 text-gray-600"></i> Código:
                        {{ $casa->codigo }}</span>

                    <span class="text-3xl font-bold text-[#404656] block mt-2">
                        {{ number_format($casa->precio, 0, ',', '.') }}
                        {{ $casa->tipo == 'venta' ? '$us' : 'Bs' }}
                    </span>
                </div>
            </div>
            <!-- Tarjeta: Detalles -->
            <!-- Tarjeta: Detalles -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-bold text-lg mb-4 text-[#404656]">Detalles</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div class="flex items-center">
                        <i class="fas fa-bed mr-2 text-[#404656]"></i>
                        <span class="font-semibold text-[#404656]">Habitaciones:</span>
                        <span class="ml-1">{{ $casa->habitaciones }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-shower mr-2 text-[#404656]"></i>
                        <span class="font-semibold text-[#404656]">Baños:</span>
                        <span class="ml-1">{{ $casa->banos }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-warehouse mr-2 text-[#404656]"></i>
                        <span class="font-semibold text-[#404656]">Garajes:</span>
                        <span class="ml-1">{{ $casa->garajes }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex items-center">
                        <i class="fas fa-layer-group mr-2 text-[#404656]"></i>
                        <span class="font-semibold text-[#404656]">Plantas:</span>
                        <span class="ml-1">{{ $casa->plantas }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-vector-square mr-2 text-[#404656]"></i>
                        <span class="font-semibold text-[#404656]">Sup. Terreno:</span>
                        <span class="ml-1">{{ $casa->superficieTerreno }} mt2</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-ruler-combined mr-2 text-[#404656]"></i>
                        <span class="font-semibold text-[#404656]">Sup. Construida:</span>
                        <span class="ml-1">{{ $casa->superficieConstruida }} mt2</span>
                    </div>
                </div>
            </div>

            <!-- Tarjeta: Descripción -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-bold text-lg mb-2 text-[#404656]">Descripción</h3>
                <p class="text-gray-700">{{ $casa->descripcion }}</p>
            </div>

            <!-- Tarjeta: Características adicionales -->
            @if(!empty($casa->caracteristicas))
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-bold text-lg mb-2 text-[#404656]">Características adicionales</h3>
                    <ul class="list-disc list-inside text-gray-700">
                        @foreach($casa->caracteristicas as $caracteristica)
                            <li>{{ ucfirst($caracteristica) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>

        <!-- Columna derecha: Tarjeta de requerimientos -->
        <div class="space-y-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-bold text-lg mb-4 text-[#404656]">Requerimientos</h3>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Ejemplo de requerimiento 1</li>
                    <li>Ejemplo de requerimiento 2</li>
                    <li>Ejemplo de requerimiento 3</li>
                    <!-- Agrega aquí los requerimientos reales -->
                </ul>
            </div>
            <!-- Puedes agregar aquí más tarjetas, como contacto del agente, etc. -->
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.mySwiper', {
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                spaceBetween: 5,
                effect: 'slide',
                slidesPerView: 2, // Mostrar dos imágenes a la vez
                breakpoints: {
                    0: { slidesPerView: 1 }, // 1 imagen en móviles
                    768: { slidesPerView: 2 } // 2 imágenes desde 768px en adelante
                }
            });
        });
    </script>
@endsection