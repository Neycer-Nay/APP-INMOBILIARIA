@extends('layouts.main')

@section('contenido')
    <div>
        <!-- Banner para escritorio -->
        <img src="{{ asset('recursos/img/banner.png') }}" alt="Banner Servicios"
            class="w-full h-94 object-cover  hidden -mb-8 md:block rounded-b-xl shadow-b-xl">
        <!-- Banner para móvil -->
        <img src="{{ asset('recursos/img/bannerMovil.png') }}" alt="Banner Servicios Móvil"
            class="w-full h-44 object-cover  block md:hidden rounded-b-xl shadow-b-xl">
    </div>
    <section class="bg-gray-50 py-8 md:py-16 " id="servicios">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-[#000] mt-0 mb-10 md:mt-0 titulo-poppins">
                Nuestros <span class="text-[#e09129]">Servicios</span>
            </h2>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Servicio 1 -->
                <a href="#">
                    <div class="relative flex w-full flex-col rounded-xl bg-[#e09129] shadow-md hover:shadow-lg transition">
                        <div class="relative mx-4 -mt-6 h-62 flex items-center justify-center overflow-hidden rounded-xl">
                            <img src="{{ asset('recursos/img/tramite.jpg') }}" alt="Tramites"
                                class="object-cover h-full w-full rounded-xl">
                        </div>
                        <div class="p-6">
                            <h5 class="font-semibold text-xl text-[#000] titulo-poppins">TRÁMITES EN GRAL.</h5>
                        </div>
                    </div>
                </a>
                <!-- Servicio 2 -->
                <a href="#">
                    <div class="relative flex w-full flex-col rounded-xl bg-[#e09129] shadow-md hover:shadow-lg transition">
                        <div class="relative mx-4 -mt-6 h-62 flex items-center justify-center overflow-hidden rounded-xl">
                            <img src="{{ asset('recursos/img/avaluo.jpg') }}" alt="Avalúos"
                                class="object-cover h-full w-full rounded-xl">
                        </div>
                        <div class="p-6">
                            <h5 class="font-semibold text-xl text-text-[#000] titulo-poppins">AVALÚOS</h5>
                        </div>
                    </div>
                </a>
                <!-- Servicio 3 -->
                <a href="#">
                    <div class="relative flex w-full flex-col rounded-xl bg-[#e09129] shadow-md hover:shadow-lg transition">
                        <div class="relative mx-4 -mt-6 h-62 flex items-center justify-center overflow-hidden rounded-xl">
                            <img src="{{ asset('recursos/img/ventacasa.jpg') }}" alt="Comercialización"
                                class="object-cover h-full w-full rounded-xl">
                        </div>
                        <div class="p-6">
                            <h5 class="font-semibold text-xl text-[#000] titulo-poppins">Comercialización de
                                Inmuebles</h5>
                        </div>
                    </div>
                </a>
                <!-- Servicio 4 -->

            </div>
        </div>
    </section>
@endsection
<style>
    .titulo-poppins {
        font-family: 'Poppins', Arial, sans-serif;
    }

    .shadow-b-xl {
        box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.25);
    }
</style>