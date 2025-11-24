@extends('layouts.main')

@section('contenido')
    <!-- Header del Blog -->
    <div class="bg-gradient-to-r from-[#404656] to-[#2c3e50] text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="text-5xl md:text-6xl font-bold titulo-poppins mb-4">BLOG INMOBILIARIO</h1>
                <p class="text-xl md:text-2xl font-light">Noticias, consejos y tendencias del mercado inmobiliario</p>
            </div>
        </div>
    </div>

    <!-- Buscador del Blog -->


    <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Sección Programa de Radio -->
        <section class="mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="bg-gradient-to-br from-red-600 to-red-800 rounded-2xl overflow-hidden shadow-2xl">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <!-- Contenido del programa -->
                    <div class="p-8 lg:p-12 text-white">
                        <div class="flex items-center mb-6">
                            <i class="fas fa-microphone text-4xl mr-4"></i>
                            <h2 class="text-3xl lg:text-4xl font-bold titulo-poppins">NEGOCIO REDONDO</h2>
                        </div>
                        <h3 class="text-2xl lg:text-3xl font-bold mb-4 text-yellow-300">"Escucha las mejores ofertas
                            inmobiliarias"</h3>

                        <div class="space-y-4 mb-8">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt mr-3 text-yellow-300"></i>
                                <span class="text-lg">Lunes a Viernes</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-3 text-yellow-300"></i>
                                <span class="text-lg">13:00 - 14:00</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-radio mr-3 text-yellow-300"></i>
                                <span class="text-lg">90.4 FM Radio Comercio</span>
                            </div>
                        </div>

                        <p class="text-lg mb-8 leading-relaxed">
                            Durante una hora completa hablamos sobre bienes inmuebles, trámites, regularización, tendencias
                            del mercado,
                            y presentamos las mejores ofertas de casas en venta, alquiler y anticrético.
                        </p>


                    </div>

                    <!-- Banner/Imagen -->
                    <div class="relative min-h-[300px] lg:min-h-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-red-800/70 to-transparent"></div>
                        <div class="h-full bg-red-900 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-broadcast-tower text-6xl mb-4 opacity-50"></i>
                                <p class="text-xl font-bold">NEGOCIO REDONDO</p>
                                <p class="text-lg">90.4 FM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reproductor Directo de Radio -->
                <div class="mt-4  rounded-xl p-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center mb-2">
                        <h3 class="text-xl font-bold text-white titulo-poppins mb-1">
                            <i class="fas fa-play-circle mr-2"></i>Reproductor en Vivo
                        </h3>
                        <p class="text-white text-sm font-medium">Escucha Negocio Redondo por la 90.4 FM en tiempo real</p>
                    </div>

                    <!-- Iframe del reproductor -->
                    <div class="rounded-lg">
                        <iframe
                            src="https://cp.usastreams.com/pr2g/APPlayerRadioHTML5.aspx?stream=https://stream.zeno.fm/zcax2fkgam8uv&fondo=05&formato=mpeg&color=14&titulo=2&autoStart=1&vol=5&tipo=14&nombre=comercio&imagen=https://cp.usastreams.com/playerHTML5/img/cover.png"
                            width="100%" height="80" frameborder="0" scrolling="no" allow="autoplay"
                            style="border-radius: 6px;">
                        </iframe>
                    </div>

                    <!-- Información adicional -->
                    <div class="mt-2 text-center">
                        <div class="flex justify-center items-center space-x-4 text-white text-sm">
                            <div class="flex items-center">
                                <i class="fas fa-signal mr-1"></i>
                                <span class="font-medium">En Vivo</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-volume-up mr-1"></i>
                                <span class="font-medium">90.4 FM</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-headphones mr-1"></i>
                                <span class="font-medium">Radio Comercio</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Sección Principal - Tendencias Inmobiliarias Santa Cruz 2025 --}}
        <section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
            <div class="container mx-auto px-4 max-w-6xl">

                {{-- Header Principal --}}
                <div class="text-center mb-12">
                    
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 titulo-poppins">
                        Tendencias del Mercado Inmobiliario en <span class="text-green-600">Santa Cruz</span>
                    </h1>
                    
                </div>

                {{-- Resumen Ejecutivo --}}
                <div class="bg-white rounded-2xl shadow-xl p-8 mb-12 border-l-4 border-blue-500">
                    <div class="flex flex-col md:flex-row items-start gap-6">
                        <div class="flex-shrink-0">
                            <div class="p-4 bg-blue-100 rounded-xl">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-gray-900 mb-3 titulo-poppins">Refugio de valor ante la inflación</h2>
                            <p class="text-gray-700 text-lg mb-4">
                                Los bienes inmuebles se están consolidando como un refugio para capitales, especialmente en
                                un escenario de inflación y escasez de dólares. Esta dinámica hace que muchas personas e
                                inversores vean al ladrillo como una forma más segura de preservar su poder adquisitivo.
                            </p>
                            <div class="flex items-center text-sm text-gray-500">
                                <span class="bg-gray-100 px-3 py-1 rounded-full">Fuente: Hemeroteca La Razón</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Grid de Tendencias Principales --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">

                    {{-- Tendencia 1: Demanda y Precios --}}
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 border-t-4 border-green-500">
                        <div class="flex items-start justify-between mb-4">
                            <div class="p-3 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </div>
                            
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 titulo-poppins">Demanda Fuerte y Precios al Alza</h3>
                        <ul class="space-y-3 mb-4">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">Velocidad de venta aumentada: <strong>13 meses → 7
                                        meses</strong></span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">Stock de inmuebles sin vender ha disminuido</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">Tendencia de aumento de precios por demanda sostenida</span>
                            </li>
                        </ul>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Citrino Capitales</span>
                            <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">IBCE</span>
                            <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Visión 360</span>
                        </div>
                    </div>

                    {{-- Tendencia 2: Perfil de Compradores --}}
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 border-t-4 border-purple-500">
                        <div class="flex items-start justify-between mb-4">
                            <div class="p-3 bg-purple-100 rounded-lg">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 titulo-poppins">Cambio en el Perfil de Compradores</h3>
                        <ul class="space-y-3 mb-4">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-purple-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700"><strong>Compradores del occidente</strong> (La Paz, Cochabamba,
                                    etc.)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-purple-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">Preferencia por viviendas <strong>más económicas</strong>
                                    (low-cost)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-purple-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">Muchas operaciones <strong>al contado (cash)</strong>, sin
                                    crédito hipotecario</span>
                            </li>
                        </ul>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">ATB</span>
                            <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Economy</span>
                        </div>
                    </div>

                    {{-- Tendencia 3: Expansión Urbana --}}
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 border-t-4 border-orange-500">
                        <div class="flex items-start justify-between mb-4">
                            <div class="p-3 bg-orange-100 rounded-lg">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 titulo-poppins">Expansión Urbana y Construcción</h3>
                        <ul class="space-y-3 mb-4">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700"><strong>Reactivación</strong> de proyectos inmobiliarios y
                                    preventas</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">Enfoque en <strong>viviendas accesibles</strong> para demanda
                                    creciente</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">Santa Cruz: punto estratégico por <strong>crecimiento
                                        demográfico</strong></span>
                            </li>
                        </ul>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Economy</span>
                        </div>
                    </div>
                </div>

                {{-- Sección de Alertas y Riesgos --}}
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Aspectos a Considerar</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- Card Remates Judiciales --}}
                        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-red-500">
                            <div class="flex items-center mb-4">
                                <div class="p-3 bg-red-100 rounded-lg mr-4">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 titulo-poppins">Remates e Inquietudes Crediticias</h3>
                            </div>
                            <ul class="space-y-3 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Santa Cruz concentra <strong>más del 50%</strong> de los remates judiciales</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Descuentos promedio en remates: <strong>~11.7%</strong> en Santa Cruz</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Oportunidades para compradores con liquidez, pero riesgos para vendedores</span>
                                </li>
                            </ul>
                            <div class="mt-4">
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-3 py-1 rounded-full">Fuente:
                                    LinkedIn</span>
                            </div>
                        </div>

                        {{-- Card Riesgos Legales --}}
                        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-yellow-500">
                            <div class="flex items-center mb-4">
                                <div class="p-3 bg-yellow-100 rounded-lg mr-4">
                                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 titulo-poppins">Riesgos Legales y de Mercado</h3>
                            </div>
                            <ul class="space-y-3 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Riesgos por <strong>títulos no bien saneados</strong></span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Importancia de <strong>verificación exhaustiva</strong> al comprar</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Posibles síntomas de <strong>sobrevaloración</strong> en el mercado</span>
                                </li>
                            </ul>
                            <div class="mt-4">
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium px-3 py-1 rounded-full">Fuente:
                                    NextEra</span>
                                
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection

<style>
    .titulo-poppins {
        font-family: 'Poppins', Arial, sans-serif;
    }

    .shadow-b-xl {
        box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.25);
    }

    /* Animaciones personalizadas */
    @keyframes pulse-slow {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.7;
        }
    }

    .animate-pulse-slow {
        animation: pulse-slow 2s infinite;
    }

    /* Efectos hover mejorados */
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    /* Responsive mejorado */
    @media (max-width: 768px) {
        .text-5xl {
            font-size: 2.5rem;
        }

        .text-6xl {
            font-size: 3rem;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
    }

    /* Efectos de gradiente */
    .gradient-text {
        background: linear-gradient(135deg, #404656, #2c3e50);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

@push('scripts')

@endpush