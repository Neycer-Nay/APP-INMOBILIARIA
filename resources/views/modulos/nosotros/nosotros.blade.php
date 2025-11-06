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
                        <p class="text-[#404656] font-bold italic">En Casa y Chalet somos la empresa más completa del
                            mercado
                            inmobiliario y estamos aquí para ayudarte a encontrar ese espacio ideal para tu vida o tu
                            negocio. Con 36 años de experiencia en el rubro y un equipo apasionado por lo que hace, te
                            acompañamos en cada paso para que vivas la mejor experiencia al buscar tu nuevo hogar o
                            inversión.</p>
                    </section>
                    <!-- Servicios -->
                    <section>
                        <img src="{{ asset('recursos/img/c-c.png') }}" alt="fachada Casa y Chalet"
                            class="rounded-lg shadow-md w-full object-cover max-h-82">
                    </section>
                </div>
                <!-- Derecha: Misión, Visión y Valores -->
                <div class="md:w-1/2 flex flex-col gap-6">
                    <div class="bg-[#e09129] bg-opacity-10 rounded-lg p-6 shadow-md">
                        <h3 class="text-xl font-bold mb-2 text-white titulo-poppins">Misión</h3>
                        <p class="text-[#000] font-bold italic">Brindar soluciones inmobiliarias integrales, honestas y
                            personalizadas, acompañando a nuestros clientes en cada etapa de su proceso de compra, venta o
                            alquiler.</p>
                    </div>
                    <div class="bg-[#e09129] bg-opacity-10 rounded-lg p-6 shadow-md">
                        <h3 class="text-xl font-bold mb-2 text-white titulo-poppins">Visión</h3>
                        <p class="text-[#000] font-bold italic">Ser la inmobiliaria líder en la región, reconocida por la
                            excelencia en el servicio, la innovación y la confianza de nuestros clientes.</p>
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
            <span class="text-white mr-2">✔</span> Compromiso
        </li>
        <li class="flex items-center text-[#000] font-bold italic">
            <span class="text-white mr-2">✔</span> Respeto
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
                Casa y Chalet nació hace 36 años con el objetivo de ofrecer soluciones inmobiliarias confiables y
                personalizadas.
                Desde nuestros inicios, hemos trabajado con pasión y dedicación para convertirnos en una de las
                inmobiliarias más
                reconocidas de la región. Fuimos pioneros en el país al realizar operaciones de compra y venta de
                propiedades a través de la televisión,
                marcando un antes y un después en la forma de conectar con nuestros clientes.
                Hoy, continuamos creciendo y evolucionando, adaptándonos a las nuevas tendencias digitales y al uso de las
                redes sociales
                para brindar una atención más cercana, moderna y efectiva. Nuestro compromiso con la excelencia y la
                innovación sigue siendo
                el pilar que nos impulsa día a día.
            </p>
        </section>
        <section class="mt-8">
            <h2 class="text-2xl font-bold mb-4 text-[#404656] titulo-poppins">Testimonios</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"Gracias a Casa y Chalet encontré la casa de mis sueños. Su equipo fue
                        muy
                        profesional y me acompañó en todo el proceso."</p>
                    <p class="text-sm text-[#404656] font-bold mt-4">- Ana Rodríguez</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"Excelente servicio. Me ayudaron a vender mi propiedad rápidamente y
                        con
                        total transparencia."</p>
                    <p class="text-sm text-[#404656] font-bold mt-4">- Luis Fernández</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"El equipo de Casa y Chalet fue increíble. Me ayudaron a encontrar la
                        casa perfecta para mi familia en tiempo récord. ¡Gracias por su profesionalismo!"</p>
                    <p class="text-sm text-[#404656] font-bold mt-4">- Sofía Martínez</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"Vendí mi propiedad con Casa y Chalet y fue una experiencia excelente.
                        Su equipo me mantuvo informado en todo momento y lograron un gran precio."</p>
                    <p class="text-sm text-[#404656] font-bold mt-4">- Andrés López</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"Gracias a Casa y Chalet pude alquilar mi departamento rápidamente. Su
                        atención al cliente es de primera y siempre estuvieron disponibles para resolver mis dudas."</p>
                    <p class="text-sm text-[#404656] font-bold mt-4">- Mariana Torres</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-[#404656] italic">"Recomiendo Casa y Chalet al 100%. Me ayudaron con el avalúo de mi
                        terreno y todo el proceso fue transparente y profesional."</p>
                    <p class="text-sm text-[#404656] font-bold mt-4">- Javier Gómez</p>
                </div>
            </div>
        </section>
        <section class="mt-8">
            <h2 class="text-2xl font-bold mb-4 text-[#404656] titulo-poppins">Nuestra Ubicación</h2>
            <div class="w-full rounded-lg overflow-hidden bg-white shadow ">
                <div class="w-full h-[420px] md:h-[640px] lg:h-[460px]">
                    <!-- Reemplaza el src por la ubicación exacta de tu oficina si es necesario -->
                    <div class="w-full map-container">
                        <iframe class="map-iframe"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2147.3522001791844!2d-63.175143871952905!3d-17.773250674385327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e7df4d895fab%3A0x9b482fbb9002b695!2sCasa%20y%20Chalet!5e1!3m2!1ses!2sbo!4v1761145812769!5m2!1ses!2sbo"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        <!-- botón para abrir/cerrar vista completa -->
                        <button type="button" class="map-fullscreen-btn"
                            aria-label="Ver mapa en pantalla completa">⤢</button>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-6">
                <a href="https://www.google.com/maps/place/Casa+y+Chalet/@-17.7732507,-63.1751439,17z/data=!3m1!4b1!4m6!3m5!1s0x93f1e7df4d895fab:0x9b482fbb9002b695!8m2!3d-17.7732507!4d-63.1729552!16s%2Fg%2F11b6z5x5q8"
                    target="_blank"
                    class="bg-[#e09129] text-white font-semibold p-2 rounded transition-all hover:bg-[#FFC857] titulo-poppins">
                    VER EN GOOGLE MAPS
                </a>
            </div>
        </section>
    </div>

@endsection

<style>
    .titulo-poppins {
        font-family: 'Poppins', sans-serif;
    }
    /* Estilos recomendados para el mapa: aspecto limpio, responsive y modo "pantalla completa" */

    .map-container {
        position: relative;
        width: 100%;
        /* altura responsiva: usa vh para que el mapa se vea "completo" en pantalla */
        height: 60vh;
        max-height: 920px;
        /* evita excesos en pantallas muy grandes */
        min-height: 360px;
        /* evita que sea demasiado pequeño en móviles */
        overflow: hidden;
        border-radius: 0.5rem;
        background: #f5f5f5;
    }

    /* iframe ocupa todo el contenedor */
    .map-iframe {
        width: 100%;
        height: 90%;
        border: 0;
        display: block;
    }

    /* botón flotante para pantalla completa (arriba a la derecha) */
    .map-fullscreen-btn {
        position: absolute;
        top: 0.6rem;
        right: 0.6rem;
        z-index: 40;
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        border: none;
        padding: 0.45rem 0.6rem;
        border-radius: 0.375rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        transition: background .15s ease;
    }

    .map-fullscreen-btn:hover {
        background: rgba(0, 0, 0, 0.7);
    }

    /* clase que activa el "fullscreen" visual (no usa Fullscreen API para compatibilidad) */
    .map-container.map-fullscreen {
        position: fixed;
        inset: 0;
        width: 100%;
        height: 100vh;
        padding: 1.25rem;
        z-index: 60;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.55);
        border-radius: 0;
    }

    /* cuando está en fullscreen, hacer que el iframe se vea con espacio */
    .map-container.map-fullscreen .map-iframe {
        height: calc(100vh - 2.5rem);
        max-height: none;
        border-radius: 0.375rem;
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.45);
    }

    /* botón cuando está en fullscreen (cambiar icono) */
    .map-container.map-fullscreen .map-fullscreen-btn {
        right: 1.25rem;
        top: 1.25rem;
        background: rgba(255, 255, 255, 0.12);
        background-color: #000;
        color: #fff;
    }

    /* tamaños responsivos: si prefieres px en lugar de vh, ajusta aquí */
    @media (min-width: 1024px) {
        .map-container {
            height: 70vh;
            min-height: 480px;
        }
    }

    @media (max-width: 640px) {
        .map-container {
            height: 68vh;
            min-height: 320px;
        }
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