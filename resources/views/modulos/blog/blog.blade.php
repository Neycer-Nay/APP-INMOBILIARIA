@extends('layouts.main')

@section('contenido')
    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Título principal -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <div class="flex items-center justify-center lg:justify-start">
                <h2 class="text-6xl md:text-7xl font-extrabold text-[#404656] leading-tight titulo-poppins text-center lg:text-left"
                    data-aos="fade-right" data-aos-duration="1000">
                    PROCESO<br />DE VENTA
                </h2>
            </div>
            <div class="space-y-12">
                <!-- Etapa 1 -->
                <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">1</div>
                    <div>
                        <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">RECEPCIÓN Y REVISIÓN DE DOCUMENTACIÓN</h3>
                        <p class="text-gray-600">Solicitamos toda la documentación del inmueble para su verificación legal y técnica. Una vez revisada, realizamos copias y las archivamos en una carpeta física y digital del inmueble, asegurando que todo esté en orden antes de comenzar el proceso de comercialización.</p>
                    </div>
                </div>

                <!-- Etapa 2 -->
                <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">2</div>
                    <div>
                        <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">REGISTRO Y LEVANTAMIENTO DE INFORMACIÓN</h3>
                        <p class="text-gray-600">Nuestro equipo se traslada al inmueble para realizar un registro completo, que incluye tomas fotográficas profesionales, grabación de videos promocionales, recolección de datos sobre superficie, ambientes y características generales, y evaluación del entorno.</p>
                    </div>
                </div>

                <!-- Etapa 3 -->
                <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">3</div>
                    <div>
                        <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">FIRMA DEL CONTRATO DE EXCLUSIVIDAD</h3>
                        <p class="text-gray-600">Una vez acordados los términos de representación, se firma un contrato de exclusividad, garantizando un manejo profesional, transparente y con dedicación total a la venta de tu propiedad.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nuevo título alineado a la derecha -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start mt-16">
            <div class="flex items-center justify-center lg:justify-start">
                <h2 class="text-6xl md:text-7xl font-extrabold text-[#404656] leading-tight titulo-poppins text-center lg:text-left"
                    data-aos="fade-right" data-aos-duration="1000">
                    MÁS<br />ETAPAS
                </h2>
            </div>
            <div class="space-y-12">
                <!-- Etapa 4 -->
                <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">4</div>
                    <div>
                        <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">PRODUCCIÓN Y PROMOCIÓN DEL INMUEBLE</h3>
                        <p class="text-gray-600">El material fotográfico y audiovisual es editado y optimizado por nuestro equipo para lograr la mejor presentación. Luego, el inmueble se promociona a través de nuestros canales de difusión como TikTok, Facebook y publicidad radial.</p>
                    </div>
                </div>

                <!-- Etapa 5 -->
                <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">5</div>
                    <div>
                        <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">ATENCIÓN A INTERESADOS Y VISITAS GUIADAS</h3>
                        <p class="text-gray-600">Cuando hay interesados, uno de nuestros agentes capacitados coordina la visita al inmueble, guiando al comprador y brindando toda la información necesaria sobre la propiedad.</p>
                    </div>
                </div>

                <!-- Etapa 6 -->
                <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">6</div>
                    <div>
                        <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">ASESORAMIENTO EN LA VENTA</h3>
                        <p class="text-gray-600">Una vez concretada la negociación, Casa y Chalet acompaña al comprador y al vendedor durante todo el proceso de cierre y trámites legales, asegurando que la transacción se realice de forma segura y transparente.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .titulo-poppins {
        font-family: 'Poppins', Arial, sans-serif;
    }

    .shadow-b-xl {
        box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.25);
    }
</style>