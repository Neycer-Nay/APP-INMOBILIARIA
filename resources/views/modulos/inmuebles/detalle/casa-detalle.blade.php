@extends('layouts.main')
@section('contenido')

    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6 mt-8 mb-8">


        <!-- Galería de fotos -->
        <div class="mb-6">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($casa->fotos as $foto)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . ltrim($foto->ruta_imagen, '/')) }}" alt="Foto casa"
                                class="w-full h-64 md:h-96 object-cover rounded">
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
        <h2 class="text-2xl font-bold text-center mb-6 text-[#404656]">{{ mb_strtoupper($casa->categoria) }} EN
            {{ mb_strtoupper($casa->tipo) }}
        </h2>
        <p class="text-center text-gray-500 mb-4">{{ mb_strtoupper($casa->direccion) }}, {{ ucfirst($casa->ciudad) }}</p>
        <!-- Características principales -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <span class="font-semibold text-[#404656]">Código:</span> {{ $casa->codigo }}<br>
                <span class="font-semibold text-[#404656]">Zona:</span> {{ ucfirst($casa->zona) }}<br>
                <span class="font-semibold text-[#404656]">Estado:</span> {{ ucfirst($casa->estado) }}<br>
                <span class="font-semibold text-[#404656]">Precio:</span> {{ number_format($casa->precio, 0, ',', '.') }}
                {{ $casa->tipo == 'venta' ? '$us' : 'Bs' }}<br>
            </div>
            <div>
                <span class="font-semibold text-[#404656]">Habitaciones:</span> {{ $casa->habitaciones }}<br>
                <span class="font-semibold text-[#404656]">Baños:</span> {{ $casa->banos }}<br>
                <span class="font-semibold text-[#404656]">Garajes:</span> {{ $casa->garajes }}<br>
                <span class="font-semibold text-[#404656]">Plantas:</span> {{ $casa->plantas }}<br>
                <span class="font-semibold text-[#404656]">Superficie Terreno:</span> {{ $casa->superficieTerreno }} mt2<br>
                <span class="font-semibold text-[#404656]">Superficie Construida:</span> {{ $casa->superficieConstruida }}
                mt2<br>
            </div>
        </div>

        <!-- Descripción -->
        <div class="mb-6">
            <h3 class="font-bold text-lg mb-2 text-[#404656]">Descripción</h3>
            <p class="text-gray-700">{{ $casa->descripcion }}</p>
        </div>

        <!-- Características adicionales -->
        @if(!empty($casa->caracteristicas))
            <div>
                <h3 class="font-bold text-lg mb-2 text-[#404656]">Características adicionales</h3>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($casa->caracteristicas as $caracteristica)
                        <li>{{ ucfirst($caracteristica) }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                spaceBetween: 20,
                effect: 'slide',
            });
        });
    </script>
@endsection