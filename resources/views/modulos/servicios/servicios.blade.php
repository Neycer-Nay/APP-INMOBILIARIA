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
    <section class="bg-gray-50 py-8 md:py-16" id="servicios">
        <div class="max-w-7xl mx-auto py-20 px-4 bg-white">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                <!-- Título grande a la izquierda -->
                <div class="flex items-center justify-center lg:justify-start">
                    <h2 class="text-6xl md:text-7xl font-extrabold text-[#404656] leading-tight titulo-poppins text-center lg:text-left"
                        data-aos="fade-right" data-aos-duration="1000">
                        NUESTROS<br />SERVICIOS
                    </h2>
                </div>

                <!-- Servicios 1, 2, 3 -->
                <div class="space-y-12">
                    <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">1</div>
                        <div>
                            <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">TRÁMITES</h3>
                            <p class="text-gray-600">Realizamos trámites del sector inmobiliario, brindando acompañamiento legal y técnico para la regularización y saneamiento de propiedades, garantizando documentación en regla y respaldo jurídico durante todo el proceso.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">2</div>
                        <div>
                            <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">AVALÚOS</h3>
                            <p class="text-gray-600">Realizamos avalúos precisos y confiables para propiedades urbanas, rurales y comerciales. Nuestros ingenieros, avalados por la Sociedad de Ingenieros de Bolivia, garantizan informes técnicos profesionales para compra, venta, crédito o sucesión.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">3</div>
                        <div>
                            <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">COMERCIALIZACIÓN DE INMUEBLES</h3>
                            <p class="text-gray-600">Te ayudamos a vender, alquilar o promocionar tu propiedad de forma rápida y segura, mediante contrato de exclusividad o publicidad directa del inmueble. Garantizamos una amplia difusión en redes sociales, radio y transmisiones en vivo, alcanzando miles de potenciales clientes.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nuevo título alineado a la derecha -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start mt-16">
                <div class="flex items-center justify-center lg:justify-start">
                    <h2 class="text-6xl md:text-7xl font-extrabold text-[#404656] leading-tight titulo-poppins text-center lg:text-left"
                        data-aos="fade-right" data-aos-duration="1000">
                        MÁS<br />SERVICIOS
                    </h2>
                </div>

                <!-- Servicios 4, 5, 6 -->
                <div class="space-y-12">
                    <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">4</div>
                        <div>
                            <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">ADMINISTRACIÓN DE ALQUILERES</h3>
                            <p class="text-gray-600">Nos encargamos de la gestión completa de tus inmuebles en alquiler, supervisando pagos, mantenimiento y comunicación con los inquilinos de forma profesional.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">5</div>
                        <div>
                            <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">PRÉSTAMOS CON GARANTÍAS</h3>
                            <p class="text-gray-600">Ofrecemos soluciones financieras respaldadas con garantías hipotecarias o prendarias, con condiciones claras y asesoramiento profesional.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">6</div>
                        <div>
                            <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">MARKETING INMOBILIARIO DIGITAL</h3>
                            <p class="text-gray-600">Potenciamos tu propiedad con estrategias modernas de promoción digital, incluyendo videos profesionales, recorridos virtuales y campañas segmentadas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sección: Formulario de consulta + Mapa -->
    <div class="max-w-7xl mx-auto py-12 px-4 mb-12">
        <div class="bg-white rounded-lg shadow p-6">


            <!-- Contenedor: FORM y MAPA en columnas separadas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">

                <!-- Columna: Formulario (con título centrado arriba) -->
                <div class="flex flex-col items-center">
                    <h4 class="text-2xl md:text-3xl font-bold text-[#404656] mb-4 titulo-poppins text-center">Formulario de
                        consulta</h4>
                        <span class="text-sm text-gray-500  mb-4 text-center">Puedes consultar por cualquiera de nuestros servicios.</span>

                    <div class="max-w-[560px] w-full mx-auto bg-[#ffff] rounded-lg shadow-md p-4">
                        <form id="formContactoWhatsapp" onsubmit="enviarWhatsappInicio(event)">
                            <div class="mb-4">
                                <label class="block mb-2 text-[#404656] font-bold" for="nombre">Nombre</label>
                                <input id="nombre" name="nombre" placeholder="Tu Nombre" required
                                    class="w-full p-2 border-b-2 border-[#e09129] bg-transparent outline-none focus:border-b-2 focus:border-yellow-600"
                                    type="text" />
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-[#404656] font-bold" for="celular">Teléfono</label>
                                <input id="celular" name="celular" placeholder="Tu Teléfono (sin espacios)" required
                                    class="w-full p-2 border-b-2 border-[#e09129] bg-transparent outline-none focus:border-b-2 focus:border-yellow-600"
                                    type="number" />
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-[#404656] font-bold" for="asunto">Asunto</label>
                                <textarea id="asunto" name="asunto" placeholder="Tu Consulta"
                                    class="w-full p-2 border-b-2 border-[#e09129] bg-transparent outline-none focus:border-b-2 focus:border-yellow-600"
                                    rows="4"></textarea>
                            </div>

                            <p id="form-msg" class="text-sm text-red-600 hidden mb-2"></p>

                            <div class="mb-4">
                                <button id="btnEnviar"
                                    class="w-full bg-[#e09129] text-white font-semibold p-2 rounded transition-all hover:bg-[#FFC857] titulo-poppins"
                                    type="submit">
                                    ENVIAR CONSULTA
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Columna: Mapa (con título centrado arriba) -->
                <div class="flex flex-col items-center">
                    <h4 class="text-2xl md:text-3xl font-bold text-[#404656] mb-4 titulo-poppins text-center">Ubicación de
                        nuestras oficina</h4>

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

<style>
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
        function enviarWhatsappInicio(event) {
            event.preventDefault();

            const msgEl = document.getElementById('form-msg');
            msgEl.classList.add('hidden');
            msgEl.textContent = '';

            const btn = document.getElementById('btnEnviar');
            const nombre = document.getElementById('nombre').value.trim();
            let celular = document.getElementById('celular').value.trim();
            const asunto = document.getElementById('asunto').value.trim();

            // Validación básica
            if (!nombre || !celular || !asunto) {
                msgEl.textContent = 'Nombre, celular y asunto son obligatorios.';
                msgEl.classList.remove('hidden');
                return;
            }

            // Normalizar número: quitar todo lo que no sean dígitos
            celular = celular.replace(/\D/g, '');

            // Añadir código de país por defecto si parece local (ajusta '591' si necesitas otro)
            const codigoPorDefecto = '591';
            if (!celular.startsWith(codigoPorDefecto) && celular.length <= 8) {
                celular = codigoPorDefecto + celular;
            }

            // Número destino de la empresa (reemplazar por tu número con código de país, sin '+' ni espacios)
            const numeroDestino = '59175026366'; // <- reemplazar por tu número

            // Construir mensaje
            let texto = `Hola, mi nombre es ${nombre}.\nY mi celular es: ${celular}`;
            if (asunto) texto += `\nTengo la siguiente consulta: ${asunto}`;



            // Abrir WhatsApp Web / app
            const url = `https://wa.me/${numeroDestino}?text=${encodeURIComponent(texto)}`;

            // Feedback: deshabilitar botón brevemente para evitar doble click
            btn.disabled = true;
            btn.classList.add('opacity-60', 'cursor-not-allowed');

            // Abrir en nueva pestaña
            window.open(url, '_blank');

            // Rehabilitar botón después de abrir
            setTimeout(() => {
                btn.disabled = false;
                btn.classList.remove('opacity-60', 'cursor-not-allowed');
            }, 1200);
        }
    </script>
@endpush

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