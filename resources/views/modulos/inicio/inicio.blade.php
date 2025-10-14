@extends('layouts.main')

@section('contenido')

    <div class="relative w-full h-[600px] flex items-center justify-center"
        style="background-image: url('{{ asset($imagenFondo) }}'); background-size: cover; background-position: center;">

        <div class="relative z-10 text-center text-[#404656]">
            <h1 class="text-3xl md:text-6xl text-[#e09129] font-bold titulo-poppins mb-6 leading-tight">Encuentra El Hogar
                De Tus Sueños
            </h1>
            <span class="block text-base text-[#e09129] text-center mb-4">
                Puedes buscar propiedades por <span class="font-semibold">código</span>, <span
                    class="font-semibold">zona</span>, <span class="font-semibold">operación</span> o <span
                    class="font-semibold">tipo de propiedad</span>. ¡Encuentra fácilmente lo que necesitas!
            </span>
            <form
                class="bg-white bg-opacity-80 rounded-xl font-bold p-4 flex flex-col md:flex-row justify-between items-center gap-4 max-w-lg md:max-w-4xl mx-4 md:mx-auto shadow-sm"
                method="GET" action="{{ route('casas.buscar') }}">

                <input type="text" name="codigo" placeholder="Código"
                    class="w-full md:w-auto bg-transparent border-b border-[#00bfae] focus:border-[#404656] px-2 py-1 outline-none text-gray-700" />
                <select
                    class="w-full md:w-auto bg-transparent border-b border-[#00bfae] focus:border-[#404656] px-2 py-1 outline-none text-gray-700"
                    name="tipo_operacion">
                    
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
    <div class=" min-h-screen py-8 ">
        <h3 class="text-3xl text-center mb-0 mt-2 text-[#404656] titulo-poppins">Casas e Inmuebles Recientes</h3>
        <span class="block text-base text-gray-500 text-center mb-8">
            ¡Nuevas propiedades añadidas cada semana! No pierdas la oportunidad de encontrar la ideal.
        </span>
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            @foreach($casasRecientes as $casa)
                <div class="bg-[#ffffff] rounded-lg shadow p-3">
                    <!-- Imagen principal -->
                    <a href="{{ route('casas.show', $casa->id) }}">
                        @if($casa->fotos->first())
                            <img src="{{ asset('storage/' . ltrim($casa->fotos->first()->ruta_imagen, '/')) }}" alt="Foto casa"
                                class="w-full h-68 object-cover rounded-lg mb-3">
                        @else
                            <div class="w-full h-48 bg-gray-200 rounded-lg mb-3 flex items-center justify-center text-gray-400">Sin
                                imagen</div>
                        @endif
                    </a>
                    <!-- Etiqueta tipo -->

                    <span class="inline-block bg-[#f09e02] text-white text-xs px-3 font-bold py-1 rounded mb-2">En
                        {{ ucfirst($casa->tipo) }}</span>

                    <!-- Título y dirección -->
                    <a href="{{ route('casas.show', $casa->id) }}">
                        <h3 class="font-bold text-lg text-[#404656] mb-1"> {{ mb_strtoupper($casa->titulo) }} EN
                            {{ mb_strtoupper($casa->tipo) }}
                        </h3>
                        <p class="text-sm text-gray-500 mb-2">{{ mb_strtoupper($casa->direccion) }}</p>
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
                            {{ $casa->tiendas }} Tiendas
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-bed mr-1 text-gray-600"></i>
                            {{ $casa->habitaciones }} Hab.
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-shower mr-1 text-gray-600"></i>
                            {{ $casa->banos }} Baño
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
    <div class=" min-h-screen py-8 ">
        <h3 class="text-3xl text-center mb-0 mt-2 text-[#404656] titulo-poppins">Casas en Traspaso Recientes</h3>
        <span class="block text-base text-gray-500 text-center mb-8">
    Descubre nuestros inmuebles en traspaso: con solo una cuota inicial te entregamos el inmueble y el saldo pagas al banco.</span>
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            @foreach($casasTraspasoRecientes as $casa)
                <div class="bg-[#ffffff] rounded-lg shadow p-3">
                    <!-- Imagen principal -->
                    <a href="{{ route('casas.show', $casa->id) }}">
                        @if($casa->fotos->first())
                            <img src="{{ asset('storage/' . ltrim($casa->fotos->first()->ruta_imagen, '/')) }}" alt="Foto casa"
                                class="w-full h-68 object-cover rounded-lg mb-3">
                        @else
                            <div class="w-full h-48 bg-gray-200 rounded-lg mb-3 flex items-center justify-center text-gray-400">Sin
                                imagen</div>
                        @endif
                    </a>
                    <!-- Etiqueta tipo -->

                    <span class="inline-block bg-[#f09e02] text-white text-xs px-3 font-bold py-1 rounded mb-2">En
                        {{ ucfirst($casa->tipo) }}</span>

                    <!-- Título y dirección -->
                    <a href="{{ route('casas.show', $casa->id) }}">
                        <h3 class="font-bold text-lg text-[#404656] mb-1"> {{ mb_strtoupper($casa->titulo) }} EN
                            {{ mb_strtoupper($casa->tipo) }}
                        </h3>
                        <p class="text-sm text-gray-500 mb-2">{{ mb_strtoupper($casa->direccion) }}</p>
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
                            {{ $casa->tiendas }} Tiendas
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-bed mr-1 text-gray-600"></i>
                            {{ $casa->habitaciones }} Hab.
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-shower mr-1 text-gray-600"></i>
                            {{ $casa->banos }} Baño
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
    <div class="max-w-7xl mx-auto py-12 px-4">
    <h3 class="text-3xl text-center mb-8 mt-2 text-[#404656] titulo-poppins">¿Por qué elegirnos?</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <span class="text-4xl text-[#e09129] mb-2"><i class="fas fa-award"></i></span>
            <h4 class="font-bold text-lg mb-2 text-[#404656]">Más de 36 años de experiencia</h4>
            <p class="text-gray-600 text-center">Confianza y trayectoria en el mercado inmobiliario.</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <span class="text-4xl text-[#e09129] mb-2"><i class="fas fa-user-friends"></i></span>
            <h4 class="font-bold text-lg mb-2 text-[#404656]">Atención personalizada</h4>
            <p class="text-gray-600 text-center">Te acompañamos en cada paso para encontrar tu inmueble ideal.</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <span class="text-4xl text-[#e09129] mb-2"><i class="fas fa-network-wired"></i></span>
            <h4 class="font-bold text-lg mb-2 text-[#404656]">Amplia red de clientes y propiedades</h4>
            <p class="text-gray-600 text-center">Acceso a las mejores opciones y oportunidades del mercado.</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <span class="text-4xl text-[#e09129] mb-2"><i class="fas fa-bolt"></i></span>
            <h4 class="font-bold text-lg mb-2 text-[#404656]">Trámites rápidos y transparentes</h4>
            <p class="text-gray-600 text-center">Procesos ágiles y claros para tu tranquilidad.</p>
        </div>
    </div>
</div>
@endsection
<style>
    .titulo-poppins {
        font-family: 'Poppins', Arial, sans-serif;
    }
</style>