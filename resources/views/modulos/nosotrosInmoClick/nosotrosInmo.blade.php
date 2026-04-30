@extends('layouts.main')

@section('contenido')

    <div class="mx-auto px-4 py-8 w-full md:w-[70vw]">
        <div class="bg-white p-4 md:p-8 rounded-lg shadow-md fuente">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Izquierda: Quiénes Somos y Servicios -->
                <div class="md:w-1/2 space-y-8">
                    <!-- Quiénes Somos -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-[#404656] titulo-poppins ">¿Quiénes Somos?</h2>
                        <p class="text-[#404656] font-bold italic">InmoClick es la plataforma de gestión inmobiliaria más completa del
                            mercado, diseñada para revolucionar la forma en que los agentes inmobiliarios gestionan su negocio. 
                            Con nosotros, cada agente puede gestionar de manera eficiente sus propiedades, propietarios, clientes y ventas, 
todo en un solo lugar. Nuestro objetivo es acompañarte en cada paso para que vivas la mejor experiencia 
                            gestionando tu cartera inmobiliaria de forma Digital y Organizada.
                    </section>
                    <!-- Servicios -->
                    <section>
                        <img src="{{ asset('recursos/img/INMO.png') }}" alt="fachada Inmoclick"
                            class="rounded-lg shadow-md w-full object-cover max-h-82">
                    </section>
                </div>
                <!-- Derecha: Misión, Visión y Valores -->
                <div class="md:w-1/2 flex flex-col gap-6">
                    <div class="bg-[#e09129] bg-opacity-10 rounded-lg p-6 shadow-md">
                        <h3 class="text-xl font-bold mb-2 text-white titulo-poppins">Misión</h3>
                        <p class="text-[#000] font-bold italic">Brindar a los agentes inmobiliarios una plataforma tecnológica integral, 
                            eficiente y segura que les permita gestionar propiedades, registrar propietarios, clientes y cerrar ventas 
                            de manera organizada y profesional.</p>
                    </div>
                    <div class="bg-[#e09129] bg-opacity-10 rounded-lg p-6 shadow-md">
                        <h3 class="text-xl font-bold mb-2 text-white titulo-poppins">Visión</h3>
                        <p class="text-[#000] font-bold italic">Ser la plataforma líder en gestión inmobiliaria en la región, reconocida por 
                            la excelencia en tecnológica, innovación y la confianza de los agentes inmobiliarios.</p>
                    </div>
                    <div class="bg-[#e09129] bg-opacity-10 rounded-lg p-6 shadow-md">
                        <h3 class="text-xl font-bold mb-2 text-white titulo-poppins">Valores</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center text-[#000] font-bold italic">
                                <span class="text-white mr-2">✔</span> Integridad
                            </li>
                            <li class="flex items-center text-[#000] font-bold italic">
                                <span class="text-white mr-2">✔</span> Transparencia
                            </li>
                           
                            
                            <li class="flex items-center text-[#000] font-bold italic">
                                <span class="text-white mr-2">✔</span> Innovación
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="mt-8">
            <h2 class="text-2xl font-bold mb-4 text-[#404656] titulo-poppins">Nuestra Historia</h2>
            <p class="text-[#404656] font-bold">
                InmoClick nació con el objetivo de ofrecer a los agentes inmobiliarios una herramienta integral y moderna 
                para gestionar su negocio de manera eficiente. Identificamos que los agentes necesitaban una forma organizada 
                de manejar sus propiedades, propietarios, clientes y ventas, por lo que creamos esta plataforma tecnológica 
                que simplifica y automatiza los procesos inmobiliarios.
                Fuimos pioneros en desarrollar una solución todo-en-uno que permite a cada agente subir sus propiedades, 
                registrar a los propietarios de esas casas, gestionar sus clientes y registrar cada venta realizada. 
                Hoy, continuamos creciendo y evolucionando, adaptándonos a las nuevas tendencias digitales para 
               _brindar la mejor experiencia tecnológica a nuestros usuarios.
            </p>
        </section>
        <section class="mt-8">
            <h2 class="text-2xl font-bold mb-4 text-[#404656] titulo-poppins">Funcionalidades</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-bold text-[#404656] mb-2">Gestión de Propiedades</h3>
                    <p class="text-[#404656] italic">"Cada agente puede subir sus casas y propiedades de forma fácil y rápida, 
                        con fotos, descripciones y detalles completos."</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-bold text-[#404656] mb-2">Registro de Propietarios</h3>
                    <p class="text-[#404656] italic">"Registra y gestiona la información de los propietarios de tus 
                        propiedades de manera organizada y segura."</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-bold text-[#404656] mb-2">Gestión de Clientes</h3>
                    <p class="text-[#404656] italic">"Administra tu cartera de clientes, guarda sus preferencias y necesidades 
                        para ofrecerles propiedades que coincidan con sus intereses."</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-bold text-[#404656] mb-2">Registro de Ventas</h3>
                    <p class="text-[#404656] italic">"Registra cada venta cerrada, lleva un historial completo de tus 
                        transacciones y genera reportes de tu desempeño."</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-bold text-[#404656] mb-2">Panel de Control</h3>
                    <p class="text-[#404656] italic">"Visualiza todas tus métricas, propiedades activas, ventas realizadas 
                        y clientes en un solo dashboard intuitivo."</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-bold text-[#404656] mb-2">Seguridad y Organización</h3>
                    <p class="text-[#404656] italic">"Todos tus datos están seguros y organizados. Accede anytime y desde 
                        cualquier dispositivo."</p>
                </div>
            </div>
        </section>
        <section class="mt-8">
            <h2 class="text-2xl font-bold mb-4 text-[#404656] titulo-poppins">Testimonios</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"InmoClick me ha permitido organizar todas mis propiedades en un solo lugar. 
                        Es increíble cómo puedo gestionar todo desde una sola plataforma."</p>
                    <p class="text-sm text-[#404656] font-bold mt-4">- Carlos Mendoza</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"Desde que uso InmoClick, mis ventas están registradas y puedo ver mi 
                        progreso. Total indispensable para mi negocio."</p>
                    <p class="text-sm text-[#404656] font-bold mt-4">- María Fernández</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"El registro de propietarios es super útil. Puedo tener toda la información 
                        organizada y acceder cuando la necesito."</p>
                    <p class="text-sm text-[#404656] font-bold mt-4">- Pedro Gómez</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"Gracias a InmoClick puedo gestionar mis clientes y sus preferencias. Esto me 
ayuda a encontrarles propiedades ideales."
                    <p class="text-sm text-[#404656] font-bold mt-4">- Laura Torres</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"La plataforma es muy intuitiva y fácil de usar. Me membantu a ahorrar tiempo 
y focus en lo importante: vender propiedades."
                    <p class="text-sm text-[#404656] font-bold mt-4">- Jorge Ramírez</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"Recomiendo InmoClick al 100%. Es la mejor herramienta para cualquier 
                        agente inmobiliario que quiere crecer su negocio."</p>
                    <p class="text-sm text-[#404656] font-bold mt-4">- Ana Lucía Castro</p>
                </div>
            </div>
        </section>
    </div>

@endsection

<style>
    .titulo-poppins {
        font-family: 'Poppins', sans-serif;
    }
</style>

@push('scripts')
    <script>
        // Delegado para el botón de pantalla completa del mapa
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.map-fullscreen-btn');
            if (!btn) return;
            const container = btn.closest('.map-container');
            if (!container) return;

            container.classList.toggle('map-fullscreen');

            if (container.classList.contains('map-fullscreen')) {
                // cambiar icono a cerrar y evitar scroll del body
                btn.textContent = '✕';
                document.documentElement.style.overflow = 'hidden';
                document.body.style.overflow = 'hidden';
            } else {
                btn.textContent = '⤢';
                document.documentElement.style.overflow = '';
                document.body.style.overflow = '';
            }
        });
    </script>
@endpush
