@extends('layouts.main')

@section('contenido')
<section class="bg-gray-50 py-16" id="servicios">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <!-- Título principal -->
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
            Nuestros <span class="text-[#e09129]">Servicios</span>
        </h2>
        <p class="text-gray-600 mb-12 max-w-3xl mx-auto">
            Ofrecemos soluciones integrales para propietarios, compradores e inversionistas.
            Confía en nuestra experiencia y respaldo profesional.
        </p>

        <!-- Grid de servicios -->
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Servicio 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 card">
                <div class="flex justify-center mb-4">
                    <i class="fa-solid fa-file-contract text-[#e09129] text-5xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Regularización de Derecho Propietario</h3>
                <p class="text-gray-600">
                    Te acompañamos en todo el proceso legal y técnico para la regularización de tu propiedad, asegurando que cuentes con documentación legal actualizada.
                </p>
            </div>
            

            <!-- Servicio 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 card">
                <div class="flex justify-center mb-4">
                    <i class="fa-solid fa-scale-balanced text-[#e09129] text-5xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Avalúos Profesionales</h3>
                <p class="text-gray-600">
                    Avalúos precisos y confiables para propiedades urbanas, rurales o comerciales. Informes técnicos elaborados por peritos certificados.
                </p>
            </div>

            <!-- Servicio 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 card">
                <div class="flex justify-center mb-4">
                    <i class="fa-solid fa-house-chimney text-[#e09129] text-5xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Comercialización de Inmuebles</h3>
                <p class="text-gray-600">
                    Promocionamos tu propiedad con contrato de exclusividad o trato directo. Llegamos a miles de personas mediante redes sociales, radio y transmisiones en vivo.
                </p>
            </div>

            <!-- Servicio 4 -->
            <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 card">
                <div class="flex justify-center mb-4">
                    <i class="fa-solid fa-video text-[#e09129] text-5xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Marketing Inmobiliario Digital</h3>
                <p class="text-gray-600">
                    Creamos contenido atractivo y profesional para tus propiedades: videos, publicaciones y transmisiones en vivo. Más de 150.000 seguidores en TikTok nos respaldan.
                </p>
            </div>

            <!-- Servicio 5 -->
            <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 card">
                <div class="flex justify-center mb-4">
                    <i class="fa-solid fa-handshake text-[#e09129] text-5xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Asesoramiento Integral</h3>
                <p class="text-gray-600">
                    Te guiamos en todo el proceso de compra, venta o regularización. Nuestro equipo te brinda la tranquilidad y respaldo que necesitas.
                </p>
            </div>
        </div>

        <!-- CTA final -->
        <div class="mt-16 bg-[#e09129]/10 p-8 rounded-2xl">
            <h3 class="text-2xl font-semibold text-gray-800 mb-3">
                ¿Necesitas ayuda con tu propiedad?
            </h3>
            <p class="text-gray-600 mb-6">
                Contáctanos y recibe asesoramiento sin compromiso. Estamos listos para ayudarte.
            </p>
            <a href="#contacto"
               class="bg-[#e09129] hover:bg-[#d6811f] text-white font-semibold py-3 px-6 rounded-full transition">
                Solicitar Asesoría
            </a>
        </div>
    </div>
</section>

@endsection



<style>
    .titulo-poppins {
        font-family: 'Poppins', Arial, sans-serif;
    }
    /* From Uiverse.io by adamgiebl */ 
.card {
  width: auto;
  height: auto;
  border-radius: 30px;
  background: #e0e0e0;
  box-shadow: 15px 15px 30px #bebebe,
             -15px -15px 30px #ffffff;
}
</style>