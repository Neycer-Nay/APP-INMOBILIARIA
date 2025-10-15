@extends('layouts.main')

@section('contenido')    
    <div class="mx-auto px-4 py-8 w-full md:w-[70vw]">
    <div class="bg-[#F8F5F2] p-4 md:p-8 rounded-lg shadow-md fuente">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Izquierda: Quiénes Somos y Servicios -->
            <div class="md:w-1/2 space-y-8">
                <!-- Quiénes Somos -->
                <section>
                    <h2 class="text-2xl font-bold mb-4 text-[#404656]">¿Quiénes Somos?</h2>
                    <p class="text-[#404656] font-bold">En Casa y Chalet somos la empresa más completa del mercado inmobiliario y estamos aquí para ayudarte a encontrar ese espacio ideal para tu vida o tu negocio. Con 36 años de experiencia en el rubro y un equipo apasionado por lo que hace, te acompañamos en cada paso para que vivas la mejor experiencia al buscar tu nuevo hogar o inversión.</p>
                </section>
                <!-- Servicios -->
                <section>
                    <img src="{{ asset('recursos/img/c-c.png') }}" alt="fachada Casa y Chalet" class="rounded-lg shadow-md w-full object-cover max-h-82">
                </section>
            </div>
            <!-- Derecha: Misión, Visión y Valores -->
            <div class="md:w-1/2 flex flex-col gap-6">
                <div class="bg-[#e09129] bg-opacity-10 rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-2 text-white">Misión</h3>
                    <p class="text-[#000] font-bold">Brindar soluciones inmobiliarias integrales, honestas y personalizadas, acompañando a nuestros clientes en cada etapa de su proceso de compra, venta o alquiler.</p>
                </div>
                <div class="bg-[#e09129] bg-opacity-10 rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-2 text-white">Visión</h3>
                    <p class="text-[#000] font-bold">Ser la inmobiliaria líder en la región, reconocida por la excelencia en el servicio, la innovación y la confianza de nuestros clientes.</p>
                </div>
                <div class="bg-[#e09129] bg-opacity-10 rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-2 text-white">Valores</h3>
                    <ul class="list-disc list-inside text-[#000] font-bold">
                        <li>Integridad</li>
                        <li>Transparencia</li>
                        <li>Compromiso</li>
                        <li>Respeto</li>
                        <li>Innovación</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    
</style>