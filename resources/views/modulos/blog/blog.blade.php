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
                        <h3 class="text-2xl lg:text-3xl font-bold mb-4 text-yellow-300">"Las mejores ofertas inmobiliarias"</h3>
                        
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
                            Durante una hora completa hablamos sobre bienes inmuebles, trámites, regularización, tendencias del mercado, 
                            y presentamos las mejores ofertas de casas en venta, alquiler y anticrético.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <button class="bg-yellow-400 text-red-800 px-6 py-3 rounded-lg font-bold hover:bg-yellow-300 transition-colors">
                                <a href="https://sites.google.com/view/radiocomercio904" target="_blank"><i class="fas fa-play mr-2"></i>Escuchar Programa</a>
                            </button>
                            
                        </div>
                    </div>

                    <!-- Banner/Imagen -->
                    <div class="relative min-h-[300px] lg:min-h-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-red-800/70 to-transparent"></div>
                        <div class="h-full bg-red-900 flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-broadcast-tower text-6xl mb-4 opacity-50"></i>
                                <p class="text-xl font-bold">En Vivo</p>
                                <p class="text-lg">90.4 FM</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

        <!-- Noticias del Mercado Inmobiliario -->
        <section class="mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#404656] titulo-poppins mb-4">Noticias del Mercado</h2>
                <p class="text-xl text-gray-600">Mantente al día con las últimas tendencias inmobiliarias</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Noticia 1 -->
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                        <i class="fas fa-chart-line text-white text-4xl"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>15 Nov 2024</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#404656] mb-3">Tendencias del Mercado Inmobiliario 2024</h3>
                        <p class="text-gray-600 mb-4">Análisis completo de las tendencias que están marcando el mercado inmobiliario este año y proyecciones para 2025.</p>
                        <a href="#" class="text-[#404656] font-medium hover:text-[#2c3e50] transition-colors">
                            Leer más <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>

                <!-- Noticia 2 -->
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center">
                        <i class="fas fa-home text-white text-4xl"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>12 Nov 2024</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#404656] mb-3">Nuevas Regulaciones para Propiedades</h3>
                        <p class="text-gray-600 mb-4">Conoce las nuevas regulaciones gubernamentales que afectan la compra y venta de propiedades inmobiliarias.</p>
                        <a href="#" class="text-[#404656] font-medium hover:text-[#2c3e50] transition-colors">
                            Leer más <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>

                <!-- Noticia 3 -->
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center">
                        <i class="fas fa-coins text-white text-4xl"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>10 Nov 2024</span>
                        </div>
                        <h3 class="text-xl font-bold text-[#404656] mb-3">Financiamiento Inmobiliario: Nuevas Opciones</h3>
                        <p class="text-gray-600 mb-4">Descubre las nuevas opciones de financiamiento disponibles para la compra de tu primera vivienda.</p>
                        <a href="#" class="text-[#404656] font-medium hover:text-[#2c3e50] transition-colors">
                            Leer más <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>
            </div>
        </section>

        <!-- Consejos para Compradores y Vendedores -->
        <section class="mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#404656] titulo-poppins mb-4">Consejos Expertos</h2>
                <p class="text-xl text-gray-600">Tips útiles para compradores y vendedores</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Consejos para Compradores -->
                <div class="bg-blue-50 rounded-xl p-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-600 text-white p-3 rounded-full mr-4">
                            <i class="fas fa-shopping-cart text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-[#404656]">Para Compradores</h3>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <h4 class="font-bold text-[#404656] mb-2">1. Define tu presupuesto</h4>
                            <p class="text-gray-600">Calcula cuánto puedes invertir considerando el enganche, gastos notariales y costos de mantenimiento.</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <h4 class="font-bold text-[#404656] mb-2">2. Investiga la zona</h4>
                            <p class="text-gray-600">Conoce el vecindario, servicios cercanos, transporte público y proyecciones de crecimiento.</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <h4 class="font-bold text-[#404656] mb-2">3. Verifica documentos</h4>
                            <p class="text-gray-600">Asegúrate de que la propiedad tenga todos sus papeles en regla antes de firmar.</p>
                        </div>
                    </div>
                </div>

                <!-- Consejos para Vendedores -->
                <div class="bg-green-50 rounded-xl p-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-600 text-white p-3 rounded-full mr-4">
                            <i class="fas fa-hand-holding-dollar text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-[#404656]">Para Vendedores</h3>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <h4 class="font-bold text-[#404656] mb-2">1. Prepara tu propiedad</h4>
                            <p class="text-gray-600">Realiza reparaciones menores y mejora la presentación para aumentar el valor percibido.</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <h4 class="font-bold text-[#404656] mb-2">2. Precio competitivo</h4>
                            <p class="text-gray-600">Investiga precios similares en la zona para establecer un precio justo y atractivo.</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <h4 class="font-bold text-[#404656] mb-2">3. Marketing efectivo</h4>
                            <p class="text-gray-600">Usa fotografías profesionales y descripciones detalladas para destacar tu propiedad.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Guías y Trámites Legales -->
        <section class="mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#404656] titulo-poppins mb-4">Guías y Trámites Legales</h2>
                <p class="text-xl text-gray-600">Todo lo que necesitas saber sobre documentación y procesos legales</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Guía 1 -->
                <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-contract text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-[#404656] mb-3">Regularización de Derecho Propietario</h3>
                    <p class="text-gray-600 text-sm mb-4">Proceso completo para regularizar tu propiedad</p>
                    <button class="text-red-600 font-medium hover:text-red-800 transition-colors">
                        Ver Guía <i class="fas fa-arrow-right ml-1"></i>
                    </button>
                </div>

                <!-- Guía 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-balance-scale text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-[#404656] mb-3">Avalúos Comerciales</h3>
                    <p class="text-gray-600 text-sm mb-4">Cómo obtener y entender un avalúo profesional</p>
                    <button class="text-blue-600 font-medium hover:text-blue-800 transition-colors">
                        Ver Guía <i class="fas fa-arrow-right ml-1"></i>
                    </button>
                </div>

                <!-- Guía 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-[#404656] mb-3">Contratos de Compraventa</h3>
                    <p class="text-gray-600 text-sm mb-4">Elementos esenciales de un contrato seguro</p>
                    <button class="text-green-600 font-medium hover:text-green-800 transition-colors">
                        Ver Guía <i class="fas fa-arrow-right ml-1"></i>
                    </button>
                </div>

                <!-- Guía 4 -->
                <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-stamp text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-[#404656] mb-3">Trámites Notariales</h3>
                    <p class="text-gray-600 text-sm mb-4">Documentos y requisitos para escrituración</p>
                    <button class="text-purple-600 font-medium hover:text-purple-800 transition-colors">
                        Ver Guía <i class="fas fa-arrow-right ml-1"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- Ofertas Destacadas de la Semana -->
        

        <!-- Historias y Casos de Éxito -->
        <section class="mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#404656] titulo-poppins mb-4">Casos de Éxito</h2>
                <p class="text-xl text-gray-600">Experiencias reales de nuestros clientes</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Testimonio 1 -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-8">
                    <div class="flex items-start mb-6">
                        <div class="bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-[#404656] mb-1">María González</h3>
                            <p class="text-blue-600 font-medium">Compró su primera casa</p>
                        </div>
                    </div>
                    <blockquote class="text-gray-700 italic mb-6">
                        "Gracias al equipo de Casa y Chalet pude comprar mi primera vivienda. Me acompañaron durante todo el proceso, 
                        desde la búsqueda hasta la firma final. Su profesionalismo y dedicación fueron excepcionales."
                    </blockquote>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-calendar mr-2"></i>
                        <span>Octubre 2024</span>
                        <i class="fas fa-star ml-4 mr-1 text-yellow-500"></i>
                        <span>5/5 estrellas</span>
                    </div>
                </div>

                <!-- Testimonio 2 -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-8">
                    <div class="flex items-start mb-6">
                        <div class="bg-green-600 text-white w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-[#404656] mb-1">Carlos Mendoza</h3>
                            <p class="text-green-600 font-medium">Vendió su departamento</p>
                        </div>
                    </div>
                    <blockquote class="text-gray-700 italic mb-6">
                        "Necesitaba vender rápido mi departamento y Casa y Chalet lo logró en menos de 2 meses. 
                        Su estrategia de marketing y su red de contactos hicieron la diferencia. Muy recomendados."
                    </blockquote>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-calendar mr-2"></i>
                        <span>Septiembre 2024</span>
                        <i class="fas fa-star ml-4 mr-1 text-yellow-500"></i>
                        <span>5/5 estrellas</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Eventos y Actividades -->
        <section class="mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#404656] titulo-poppins mb-4">Eventos y Actividades</h2>
                <p class="text-xl text-gray-600">Participa en nuestras charlas y actividades especiales</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Evento 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-[#404656] to-[#2c3e50] p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-xl font-bold mb-2">Charla: "Inversión Inmobiliaria Inteligente"</h3>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-calendar mr-2"></i>
                                    <span>25 Noviembre 2024</span>
                                    <i class="fas fa-clock ml-4 mr-2"></i>
                                    <span>19:00 hrs</span>
                                </div>
                            </div>
                            <i class="fas fa-chalkboard-teacher text-3xl opacity-70"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">
                            Aprende estrategias para invertir en bienes raíces de manera inteligente y rentable. 
                            Dirigido a inversores principiantes y experimentados.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Gratuito</span>
                            <button class="bg-[#404656] text-white px-4 py-2 rounded-lg hover:bg-[#2c3e50] transition-colors">
                                Inscribirse
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Evento 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-red-600 to-red-800 p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-xl font-bold mb-2">Programa Especial en Vivo</h3>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-calendar mr-2"></i>
                                    <span>Todos los Viernes</span>
                                    <i class="fas fa-clock ml-4 mr-2"></i>
                                    <span>13:00 hrs</span>
                                </div>
                            </div>
                            <i class="fas fa-microphone text-3xl opacity-70"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">
                            Únete a nuestro programa especial de los viernes donde respondemos preguntas en vivo 
                            y presentamos las mejores ofertas de la semana.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">90.4 FM</span>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-800 transition-colors">
                                Escuchar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Suscripción al Boletín -->
        <section class="mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="bg-gradient-to-r from-[#404656] to-[#2c3e50] rounded-2xl p-8 lg:p-12 text-white text-center">
                <div class="max-w-2xl mx-auto">
                    <i class="fas fa-envelope text-4xl mb-6"></i>
                    <h2 class="text-3xl lg:text-4xl font-bold titulo-poppins mb-4">Mantente Informado</h2>
                    <p class="text-xl mb-8">
                        Suscríbete a nuestro boletín y recibe las mejores ofertas, noticias del mercado y consejos expertos 
                        directamente en tu correo electrónico.
                    </p>
                    
                    <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                        <input type="email" placeholder="Tu correo electrónico" required
                               class="flex-1 px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <button type="submit" 
                                class="bg-yellow-400 text-[#404656] px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition-colors">
                            Suscribirse
                        </button>
                    </form>
                    
                    <p class="text-sm mt-4 opacity-80">
                        No spam. Puedes cancelar tu suscripción en cualquier momento.
                    </p>
                </div>
            </div>
        </section>

        <!-- Navegación de Páginas -->
        <div class="flex justify-center items-center space-x-4" data-aos="fade-up" data-aos-duration="1000">
            <button class="bg-gray-200 text-gray-600 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors" disabled>
                <i class="fas fa-chevron-left mr-2"></i>Anterior
            </button>
            <div class="flex space-x-2">
                <button class="bg-[#404656] text-white w-10 h-10 rounded-lg font-bold">1</button>
                <button class="bg-gray-200 text-gray-600 w-10 h-10 rounded-lg hover:bg-gray-300 transition-colors">2</button>
                <button class="bg-gray-200 text-gray-600 w-10 h-10 rounded-lg hover:bg-gray-300 transition-colors">3</button>
            </div>
            <button class="bg-[#404656] text-white px-4 py-2 rounded-lg hover:bg-[#2c3e50] transition-colors">
                Siguiente<i class="fas fa-chevron-right ml-2"></i>
            </button>
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

    /* Animaciones personalizadas */
    @keyframes pulse-slow {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
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
        .text-5xl { font-size: 2.5rem; }
        .text-6xl { font-size: 3rem; }
        .grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
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
<script>
    // Funcionalidad del buscador
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[placeholder="Buscar en el blog..."]');
        const searchButton = document.querySelector('button:contains("Buscar")');
        
        if (searchInput && searchButton) {
            searchButton.addEventListener('click', function() {
                const searchTerm = searchInput.value.trim();
                if (searchTerm) {
                    // Aquí puedes implementar la lógica de búsqueda
                    console.log('Buscando:', searchTerm);
                }
            });

            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchButton.click();
                }
            });
        }

        // Funcionalidad del reproductor de audio
        const playButton = document.querySelector('.bg-yellow-400 .fa-play');
        if (playButton) {
            playButton.parentElement.addEventListener('click', function() {
                if (playButton.classList.contains('fa-play')) {
                    playButton.classList.remove('fa-play');
                    playButton.classList.add('fa-pause');
                } else {
                    playButton.classList.remove('fa-pause');
                    playButton.classList.add('fa-play');
                }
            });
        }

        // Formulario de suscripción
        const subscriptionForm = document.querySelector('form');
        if (subscriptionForm) {
            subscriptionForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.querySelector('input[type="email"]').value;
                
                // Aquí puedes implementar la lógica de suscripción
                alert('¡Gracias por suscribirte! Te hemos enviado un correo de confirmación.');
                this.reset();
            });
        }
    });
</script>
@endpush