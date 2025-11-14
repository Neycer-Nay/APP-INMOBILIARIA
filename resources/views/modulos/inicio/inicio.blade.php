@extends('layouts.main')

@section('contenido')

    <div class="relative w-full h-[600px] flex items-center justify-center"
        style="background-image: url('{{ asset($imagenFondo) }}'); background-size: cover; background-position: center;">
        <div class="banner-overlay absolute inset-0" aria-hidden="true"></div>
        <div class="relative z-10 text-center text-[#404656]">
            <h1 class="text-3xl md:text-6xl text-[#fff] font-bold titulo-poppins mb-6 leading-tight" data-aos="fade-up"
                data-aos-duration="1000">Encuentra El
                Hogar
                De Tus Sueños
            </h1>
            <span class="block text-base text-[#fff] text-center mb-4" data-aos="fade-up" data-aos-duration="1000">
                Puedes buscar propiedades por <span class="font-semibold">código</span>, <span
                    class="font-semibold">zona</span>, <span class="font-semibold">operación</span> o <span
                    class="font-semibold">tipo de propiedad</span>. ¡Encuentra fácilmente lo que necesitas!
            </span>
            <form
                class="bg-white bg-opacity-80 rounded-xl font-bold p-4 flex flex-col md:flex-row justify-between items-center gap-4 max-w-lg md:max-w-4xl mx-4 md:mx-auto shadow-sm"
                method="GET" action="{{ route('casas.buscar') }}" data-aos="fade-up" data-aos-duration="1000">

                <input type="text" name="codigo" placeholder="Código"
                    class="w-full md:w-auto bg-transparent border-b border-[#00bfae] focus:border-[#404656] px-2 py-1 outline-none text-gray-700" />
                <select
                    class="w-full md:w-auto bg-transparent border-b border-[#00bfae] focus:border-[#404656] px-2 py-1 outline-none text-gray-700"
                    name="tipo_operacion">
                    <option value="">Tipo de Operación</option>
                    <option value="venta">Comprar</option>
                    <option value="alquiler">Alquilar</option>
                    <option value="anticretico">Anticrético</option>
                    <option value="traspaso">Traspaso</option>
                </select>
                <select
                    class="w-full md:w-auto bg-transparent border-b border-[#00bfae] focus:border-[#404656] px-2 py-1 outline-none text-gray-700"
                    id="tipo_inmueble" name="tipo_inmueble">
                    <option value="">Tipo de Propiedad</option>
                    <option value="casa">Casa</option>
                    <option value="departamento">Departamento</option>
                    <option value="casa_comercial">Casa Comercial</option>
                    <option value="quinta">Quinta</option>
                    <option value="terreno">Terreno</option>
                </select>
                <select
                    class="w-full md:w-auto bg-transparent border-b border-[#00bfae] focus:border-[#404656] px-2 py-1 outline-none text-gray-700"
                    id="zona" name="zona">
                    <option value="">Zona</option>
                    <option value="norte">Norte</option>
                    <option value="centro">Centro</option>
                    <option value="sur">Sur</option>
                    <option value="este">Este</option>
                    <option value="oeste">Oeste</option>
                </select>
                <button type="submit"
                    class="w-full md:w-auto bg-[#00bfae] hover:bg-[#404656] transition-colors text-white px-8 py-2 rounded-full font-bold shadow">
                    Buscar
                </button>
            </form>

        </div>
    </div>
    <!-- Carrusel vertical automático: derecha -> izquierda (loop infinito) -->

    <div class="max-w-7xl mx-auto py-8 px-4">
        <h3 class="text-2xl md:text-3xl text-center text-[#404656] titulo-poppins font-bold mb-1">
            Encuentra tu próxima vivienda
        </h3>
        <p class="text-center text-gray-500 mb-4">Haz clic en una opción para ver propiedades disponibles</p>
        <div class="carrusel-viewport overflow-hidden titulo-poppins">
            <div class="carrusel-track">
                <!-- Repite los slides para lograr loop infinito -->
                <a href="{{ route('venta') }}?tipo_operacion=venta" class="carrusel-slide">
                    <img src="{{ asset('recursos/img/compra.jpg') }}" alt="Comprar" />
                    <span class="carrusel-label">COMPRAR</span>
                </a>
                <a href="{{ route('alquiler') }}?tipo_operacion=alquiler" class="carrusel-slide">
                    <img src="{{ asset('recursos/img/carruselAlquiler.jpg') }}" alt="Alquilar" />
                    <span class="carrusel-label">ALQUILAR</span>
                </a>
                <a href="{{ route('anticretico') }}?tipo_operacion=anticretico" class="carrusel-slide">
                    <img src="{{ asset('recursos/img/carruselAnticretico.jpg') }}" alt="Anticrético" />
                    <span class="carrusel-label">ANTICRÉTICO</span>
                </a>
                <a href="{{ route('traspaso') }}?tipo_operacion=traspaso" class="carrusel-slide">
                    <img src="{{ asset('recursos/img/carruselTraspaso.jpg') }}" alt="Traspaso" />
                    <span class="carrusel-label">CASAS CON <br> CRÉDITO</span>
                </a>

                <!-- duplicados para bucle suave -->
                <a href="{{ route('venta') }}?tipo_operacion=venta" class="carrusel-slide">
                    <img src="{{ asset('recursos/img/compra.jpg') }}" alt="Comprar" />
                    <span class="carrusel-label">COMPRAR</span>
                </a>
                <a href="{{ route('alquiler') }}?tipo_operacion=alquiler" class="carrusel-slide">
                    <img src="{{ asset('recursos/img/carruselAlquiler.jpg') }}" alt="Alquilar" />
                    <span class="carrusel-label">ALQUILAR</span>
                </a>
                <a href="{{ route('anticretico') }}?tipo_operacion=anticretico" class="carrusel-slide">
                    <img src="{{ asset('recursos/img/carruselAnticretico.jpg') }}" alt="Anticrético" />
                    <span class="carrusel-label">ANTICRÉTICO</span>
                </a>
                <a href="{{ route('traspaso') }}?tipo_operacion=traspaso" class="carrusel-slide">
                    <img src="{{ asset('recursos/img/carruselTraspaso.jpg') }}" alt="Traspaso" />
                    <span class="carrusel-label">CASAS CON <br> CRÉDITO</span>
                </a>
            </div>
        </div>
    </div>
    <div class=" min-h-screen py-8 ">
        <h3 class="text-3xl text-center mb-0 mt-2 text-[#404656] titulo-poppins">Casas e Inmuebles Recientes</h3>
        <span class="block text-base text-gray-500 text-center mb-8">
            ¡Nuevas propiedades añadidas cada semana! No pierdas la oportunidad de encontrar la ideal.
        </span>
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            @foreach($casasRecientes as $casa)
                <div class="bg-[#ffffff] rounded-lg shadow p-3">
                    <!-- Imagen principal -->
                    <div class="relative rounded-lg mb-3 overflow-hidden titulo-poppins">
                        @if($casa->fotos->first())
                            <a href="{{ route('casas.show', $casa->id) }}" class="block">
                                <img src="{{ asset('storage/' . ltrim($casa->fotos->first()->ruta_imagen, '/')) }}" alt="Foto casa"
                                    class="w-full h-68 object-cover rounded-lg">
                            </a>
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">Sin imagen</div>
                        @endif

                        @if(strtolower($casa->estado) == 'disponible')
                            <div class="estado-badge">
                                DISPONIBLE
                            </div>
                        @endif
                    </div>

                    <span class="inline-block bg-[#f09e02] text-white text-xs px-3 font-bold py-1 rounded-full mb-2">En
                        {{ ucfirst($casa->tipo) }}</span>

                    <!-- Título y dirección -->

                    <h3 class="font-bold text-lg text-[#404656] mb-1"> {{ mb_strtoupper($casa->titulo) }} EN
                        {{ mb_strtoupper($casa->tipo) }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-2"><i
                            class="fas fa-map-marker-alt text-gray-600 mr-1"></i>{{ mb_strtoupper($casa->direccion) }}</p>
                    </a>
                    <!-- Datos principales -->
                    <div class="flex items-center justify-between text-sm mb-2">
                        <div class="flex items-center gap-2">

                            <span class="font-semibold text-[#404656]">Código:</span>
                            <span>{{ $casa->codigo }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-[#404656]">Zona:</span>
                            <span>{{ ucfirst($casa->zona) }}</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm mb-2">
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-[#404656]">Estado:</span>
                            <span>{{ ucfirst($casa->estado) }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-[#404656]">Ciudad:</span>
                            <span>{{ ucfirst($casa->ciudad) }}</span>
                        </div>

                    </div>

                    <!-- Precio -->
                    <div class="text-2xl font-bold text-[#404656] mb-2">{{ number_format($casa->precio, 0, ',', '.') }}
                        {{ $casa->tipo == 'alquiler' ? 'Bs' : '$us' }}
                        </span>
                    </div>

                    <!-- Características -->
                    <div class="flex items-center justify-between text-sm border-t border-t-[#404656] pt-3 mt-3">
                        <div class="flex items-center gap-1">
                            <i class="fas fa-store mr-1 text-gray-600"></i>
                            {{ $casa->tiendas }} {{ $casa->tiendas == 1 ? 'Tienda' : 'Tiendas' }}
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-bed mr-1 text-gray-600"></i>
                            {{ $casa->habitaciones }} Hab.
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-shower mr-1 text-gray-600"></i>
                            {{ $casa->banos }} {{ $casa->banos == 1 ? 'Baño' : 'Baños' }}
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-ruler-combined mr-2 text-[#404656]"></i>
                            {{ $casa->superficieConstruida }} mt2
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-20 px-4 bg-white ">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <!-- Título grande a la izquierda -->
            <div class="flex items-center justify-center lg:justify-start">
                <h2 class="text-6xl md:text-7xl font-extrabold text-[#404656] leading-tight titulo-poppins text-center lg:text-left"
                    data-aos="fade-right" data-aos-duration="1000">
                    PROCESO<br />DE<br />COMPRA
                </h2>
            </div>

            <!-- Pasos a la derecha -->
            <div class="space-y-12">
                <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">1</div>
                    <div>
                        <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">VISITA DE LA CASA</h3>
                        <p class="text-gray-600">Estamos aquí para ayudarte a encontrar el lugar perfecto para tu familia.
                            Según tus necesidades, te sugeriremos propiedades para visitar y te reservaremos una cita.</p>
                    </div>
                </div>

                <div class="flex items-start gap-6 " data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">2</div>
                    <div>
                        <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">TÉRMINOS DE NEGOCIACIÓN</h3>
                        <p class="text-gray-600">Una vez que encuentres la propiedad ideal, nosotros negociamos directamente
                            contigo para ofrecerte las mejores condiciones y precios posibles. Siempre estamos dispuestos a
                            ajustar el precio y buscar opciones flexibles que se adapten a tu presupuesto y necesidades.</p>
                    </div>
                </div>

                <div class="flex items-start gap-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="text-7xl md:text-8xl font-extrabold text-[#404656] titulo-poppins leading-none">3</div>
                    <div>
                        <h3 class="font-bold text-xl text-[#404656] titulo-poppins mb-2">CIERRE SIN PREOCUPACIONES</h3>
                        <p class="text-gray-600">No jugamos con el tiempo; nuestro enfoque ágil y seguro para el cierre dará
                            como resultado que usted se vaya con las llaves de la propiedad de sus nuevos sueños.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-12 px-4 mb-12">
        <h3 class="text-3xl text-center mb-8 mt-2 text-[#404656] titulo-poppins" data-aos="fade-up"
            data-aos-duration="1000">¿Por qué elegirnos?</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center" data-aos="fade-right"
                data-aos-duration="1000">
                <span class="text-4xl text-[#e09129] mb-2"><i class="fas fa-award"></i></span>
                <h4 class="font-bold text-lg mb-2 text-[#404656] text-center">Más de 36 años de experiencia</h4>
                <p class="text-gray-600 text-center">Confianza y trayectoria en el mercado inmobiliario.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center" data-aos="fade-up"
                data-aos-duration="1000">
                <span class="text-4xl text-[#e09129] mb-2"><i class="fas fa-user-friends"></i></span>
                <h4 class="font-bold text-lg mb-2 text-[#404656]">Atención personalizada</h4>
                <p class="text-gray-600 text-center">Te acompañamos en cada paso para encontrar tu inmueble ideal.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center" data-aos="fade-up"
                data-aos-duration="1000">
                <span class="text-4xl text-[#e09129] mb-2"><i class="fas fa-network-wired"></i></span>
                <h4 class="font-bold text-lg mb-2 text-[#404656] text-center">Amplia red de clientes y propiedades</h4>
                <p class="text-gray-600 text-center">Acceso a las mejores opciones y oportunidades del mercado.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center" data-aos="fade-left"
                data-aos-duration="1000">
                <span class="text-4xl text-[#e09129] mb-2"><i class="fas fa-bolt"></i></span>
                <h4 class="font-bold text-lg mb-2 text-[#404656]">Trámites agiles y rápidos</h4>
                <p class="text-gray-600 text-center">Procesos ágiles y claros para tu tranquilidad.</p>
            </div>
        </div>
    </div>

    <!-- Sección: Formulario de consulta + Mapa -->
    <div class="max-w-7xl mx-auto py-12 px-4 mb-12">
        <div class="bg-white rounded-lg shadow p-6">


            <!-- Contenedor: FORM y MAPA en columnas separadas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">

                <!-- Columna: Formulario (con título centrado arriba) -->
                <div class="flex flex-col items-center">
                    <h4 class="text-2xl md:text-3xl font-bold text-[#404656] mb-4 titulo-poppins text-center">Formulario de
                        consulta</h4>

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
                        la oficina</h4>

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
<!--- estilos para los select del buscador --->
<style>
select, ::picker(select){
    appearance: base-select;
    overflow: hidden;
    border-radius: 5px;
    width: auto;
    
}
::picker(select){
    border: navy;
    background-color: #fff;
    margin: .4rem 0;
}
option:checked{
    background-color: #00bfae;
    color: #fff;
}
</style>

<style>
    .titulo-poppins {
        font-family: 'Poppins', Arial, sans-serif;
    }

    /* Estilos del carrusel */
    .carrusel-viewport {
        width: 100%;
    }

    .carrusel-track {
        display: flex;
        gap: 1rem;
        align-items: center;
        width: max-content;
        animation: carrusel-scroll 20s linear infinite;
    }

    .carrusel-slide {
        display: block;
        width: 260px;
        flex: 0 0 260px;
        text-align: center;
        color: #404656;
        text-decoration: none;
        position: relative;
        /* necesario para overlay */
        overflow: hidden;
        /* recorta overlay e imagen */
        border-radius: 0.5rem;
    }

    .carrusel-slide img {
        width: 100%;
        height: 360px;
        object-fit: cover;
        display: block;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        /* mantener la imagen debajo del overlay */
        position: relative;
        z-index: 1;
    }

    /* Overlay negro semitransparente sobre cada imagen */
    .carrusel-slide::after {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
        /* ajustar opacidad aquí */
        z-index: 2;
        pointer-events: none;
        /* que el overlay no bloquee el click del enlace */
    }

    /* Label por encima del overlay */
    .carrusel-label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 3;
        color: #ffffff;
        font-weight: 700;
        font-size: 1.3rem;
        /* fondo semi-transparente para legibilidad */
        padding: 0.45rem 0.9rem;
        border-radius: 0.375rem;
        pointer-events: none;
        /* permite clicar el enlace debajo */
        white-space: nowrap;
    }

    @keyframes carrusel-scroll {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    @media (max-width: 768px) {
        .carrusel-slide {
            width: 200px;
            flex: 0 0 200px;
        }

        .carrusel-slide img {
            height: 240px;
        }

        .carrusel-track {
            gap: 0.75rem;
            animation-duration: 16s;
        }
    }

    .carrusel-viewport:hover .carrusel-track {
        animation-play-state: paused;
    }

    .banner-overlay {
        background: rgba(0, 0, 0, 0.45);
        /* ajusta opacidad: 0.0 - 1.0 */
        pointer-events: none;
        /* no bloquea interacciones */
        z-index: 5;
        /* debe quedar entre fondo y el contenido (contenido tiene z-10) */
    }


    .estado-badge {
        position: absolute;
        top: 32px;
        right: -68px;
        z-index: 30;
        transform: rotate(30deg);
        background: #e09129;
        color: #fff;
        font-weight: 800;
        padding: 8px 110px;
        font-size: 1.05rem;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.18);
        letter-spacing: 1px;
        pointer-events: none;
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
            height: 56vh;
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