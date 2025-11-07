<header class="bg-[#e09129] bg-opacity-5 text-white shadow-lg">
  <div class="container mx-auto flex items-center h-24 justify-between md:justify-center space-x-0 md:space-x-32 px-4">
    <!-- Logo -->
    <a href="{{ route('inicio') }}" class="flex items-center justify-center">
      <img class="h-16 w-16 md:h-24 md:w-24" src="recursos/img/logo-blanco.png" alt="" />
    </a>
    <!-- Menú hamburguesa (solo móvil) -->
    <button id="mobile-menu-button"
      class="md:hidden flex items-center px-3 py-2 border rounded text-white border-white focus:outline-none">
      <svg class="fill-current h-6 w-6" viewBox="0 0 20 20">
        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
      </svg>
    </button>

    <!-- Menú centrado (desktop) -->
    <nav class="font-semibold text-sm menu-font hidden md:block">
      <ul class="flex items-center gap-x-8">
        <li class="px-3 active">
          <a href="{{ route('inicio') }}">
            <span class="nav-text">INICIO</span>
          </a>
        </li>
        <li class="px-3 group relative">

          <span class="nav-text">INMUEBLES</span>

          <ul
            class="absolute left-0 top-full mt-0 w-25 bg-[#e09129] text-[#404656] rounded shadow-lg opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-opacity duration-300 z-10">
            <li><a href="{{ route('venta') }}" class="block px-4 py-2 hover:bg-gray-100">Venta</a></li>
            <li><a href="{{ route('alquiler') }}" class="block px-4 py-2 hover:bg-gray-100">Alquiler</a></li>
            <li><a href="{{ route('anticretico') }}" class="block px-4 py-2 hover:bg-gray-100">Anticrético</a></li>
            <li><a href="{{ route('traspaso') }}" class="block px-4 py-2 hover:bg-gray-100">Crédito</a></li>
          </ul>
        </li>
        <li class="px-3 group relative">
          <a href="{{ route('servicios') }}">
            <span class="nav-text">SERVICIOS</span>
          </a>
          <!--<ul class="absolute left-0 top-full mt-0 w-35 bg-[#e09129] text-[#404656] rounded shadow-lg opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-opacity duration-300 z-10">
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Trámites </a></li>
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Avalúos</a></li>
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Préstamos hipotecarios</a></li>
          </ul>-->
        </li>
        <li class="px-3">
          <a href="{{ route('nosotros') }}">
            <span class="nav-text">NOSOTROS</span>
          </a>
        </li>
        <li class="px-3">
          <a href="{{ route('blog') }}">
            <span class="nav-text">BLOG</span>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Botón -->
    <button
      class="hidden md:inline-flex bg-gradient-to-r from-green-600 to-green-800 text-white font-semibold py-3 px-6 rounded-full shadow-lg transform hover:scale-105 transition"
      aria-label="Publicar Inmueble en WhatsApp">
      <a href="https://wa.me/59175026366?text=Quiero%20vender%20mi%20casa" target="_blank"
        class="flex items-center gap-2">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" class="w-5 h-5" />
        <span>Publicar Inmueble</span>
      </a>
    </button>
  </div>
  <!-- Menú móvil -->
  <nav id="mobile-menu" class="md:hidden hidden bg-[#e09129] bg-opacity-95 text-[#404656] px-4 pt-2 pb-4">
    <ul class="flex flex-col gap-y-2 font-semibold text-base menu-font">
      <li>
        <a href="{{ route('inicio') }}" class="block py-2 px-2 nav-text">INICIO</a>
      </li>
      <li>
        <details>
          <summary class="py-2 px-2 cursor-pointer nav-text">INMUEBLES</summary>
          <ul class="pl-4">
            <li><a href="{{ route('venta') }}" class="block py-1 px-2 hover:bg-gray-100">Venta</a></li>
            <li><a href="{{ route('alquiler') }}" class="block py-1 px-2 hover:bg-gray-100">Alquiler</a></li>
            <li><a href="{{ route('anticretico') }}" class="block py-1 px-2 hover:bg-gray-100">Anticrético</a></li>
            <li><a href="{{ route('traspaso') }}" class="block py-1 px-2 hover:bg-gray-100">Traspaso</a></li>
          </ul>
        </details>
      </li>
      <li>
        <a href="{{ route('servicios') }}" class="block py-2 px-2 nav-text">SERVICIOS</a>
      </li>
      <li>
        <a href="{{ route('nosotros') }}" class="block py-2 px-2 nav-text">NOSOTROS</a>
      </li>
      <li>
        <a href="" class="block py-2 px-2 nav-text">BLOG</a>
      </li>

    </ul>
    <div class="mt-4">
      <a href="https://wa.me/59175026366?text=Quiero%20vender%20mi%20casa" target="_blank"
        class="w-full inline-flex justify-center items-center gap-2 bg-gradient-to-r from-green-600 to-green-800 text-white font-semibold py-3 px-4 rounded-full shadow-lg">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" class="w-5 h-5" />
        <span>Publicar Inmueble</span>
      </a>
    </div>
  </nav>
</header>
<a href="{{ route('casas.create') }}">CREAR</a>
<a href="{{ route('casas.index') }}">INDEX</a>
<style>
  .nav-text {
    transition: color 0.3s ease;
  }

  li:hover .nav-text {
    color: #404656;
  }

  .menu-font {
    font-family: 'Muli', sans-serif;
  }

  .group:hover ul {
    opacity: 1;
    pointer-events: auto;
  }
</style>
<script>
  // Mostrar/ocultar menú móvil
  document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    btn && btn.addEventListener('click', function () {
      menu.classList.toggle('hidden');
    });
  });
</script>