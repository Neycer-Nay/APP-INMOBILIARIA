@extends('layouts.main')
@section('contenido')
    <!-- Galería de fotos -->
    <div class="mb-6">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($casa->fotos as $index => $foto)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . ltrim($foto->ruta_imagen, '/')) }}" alt="Foto casa"
                            class="w-full h-64 md:h-[600px] object-cover rounded cursor-pointer"
                            onclick="abrirModal({{ $index }})">
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
                        {{ $casa->tipo == 'alquiler' ? 'Bs' : '$us' }}
                    </span>
                </div>
            </div>

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
                        <span class="ml-1">{{ number_format($casa->superficieTerreno, 0, ',', '.') }} mt2</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-ruler-combined mr-2 text-[#404656]"></i>
                        <span class="font-semibold text-[#404656]">Sup. Construida:</span>
                        <span class="ml-1">{{ number_format($casa->superficieConstruida, 0, ',', '.') }} mt2</span>
                    </div>
                </div>
            </div>

            <!-- Tarjeta: Descripción -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-bold text-lg mb-2 text-[#404656]">Descripción</h3>
                <p class="text-gray-700">{!! nl2br($casa->descripcion) !!}</p>
            </div>

            <!-- Tarjeta: Características interiores -->
            @if(!empty($casa->caracteristicas))
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-bold text-lg mb-2 text-[#404656]">Características - Interiror</h3>
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
    <!-- Modal para visualizar fotos completas -->
    <div id="modalFotos"
        class="fixed inset-0 bg-black/80  items-center justify-center z-50 hidden  transition-opacity duration-300">
        <button id="cerrarModal" class="absolute top-2 right-2 text-white text-4xl cursor-pointer">&times;</button>
        <div id="modalContent" class="bg-white rounded-lg shadow-lg p-4 relative max-w-5xl w-full">
            <div class="swiper modalSwiper">
                <div class="swiper-wrapper">
                    @foreach($casa->fotos as $foto)
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="{{ asset('storage/' . ltrim($foto->ruta_imagen, '/')) }}" alt="Foto casa"
                                class="max-h-[80vh] w-auto rounded transition-all duration-300">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <style>
        #modalFotos {
            opacity: 0;
            transition: opacity 0.3s;
        }

        #modalFotos.opacity-100 {
            opacity: 1;
        }
    </style>
@endsection
@push('scripts')
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
    @endpush
@push('scripts')
    <script>
        let modalSwiper;

        function abrirModal(index) {
            const modal = document.getElementById('modalFotos');
            modal.classList.remove('hidden');
            modal.classList.add('flex', 'opacity-100');
            document.body.classList.add('overflow-hidden');
            if (!modalSwiper) {
                modalSwiper = new Swiper('.modalSwiper', {
                    loop: true,
                    navigation: {
                        nextEl: '.modalSwiper .swiper-button-next',
                        prevEl: '.modalSwiper .swiper-button-prev',
                    },
                    pagination: {
                        el: '.modalSwiper .swiper-pagination',
                        clickable: true,
                    },
                    effect: 'fade',
                    fadeEffect: { crossFade: true },
                    slidesPerView: 1,
                });
            }
            modalSwiper.slideToLoop(index, 0);
        }

        document.getElementById('cerrarModal').onclick = function () {
            cerrarModal();
        };

        // Cerrar al hacer click fuera del modal
        document.getElementById('modalFotos').onclick = function (e) {
            if (e.target === this) {
                cerrarModal();
            }
        };

        function cerrarModal() {
            const modal = document.getElementById('modalFotos');
            modal.classList.add('hidden');
            modal.classList.remove('flex', 'opacity-100');
            document.body.classList.remove('overflow-hidden');
        }
    </script>
@endpush