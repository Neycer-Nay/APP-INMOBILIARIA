<header class="bg-[#e09129] bg-opacity-5 text-white shadow-lg hidden md:block">
  <div class="container mx-auto flex items-center h-24 justify-center space-x-32">
    <!-- Logo -->
    <a href="" class="flex items-center justify-center">
      <img class="h-20 w-20" src="recursos/img/logo-blanco.png" alt="" />
    </a>
    <!-- Menú centrado -->
    <nav class="font-semibold text-sm menu-font">
      <ul class="flex items-center gap-x-8">
        <li class="px-3 active">
          <a href="">
            <span class="nav-text">INICIO</span>
          </a>
        </li>
        <li class="px-3">
          <a href="">
            <span class="nav-text">INMUEBLES</span>
          </a>
        </li>
        <li class="px-3">
          <a href="">
            <span class="nav-text">SERVICIOS</span>
          </a>
        </li>
        <li class="px-3">
          <a href="">
            <span class="nav-text">NOSOTROS</span>
          </a>
        </li>
        <li class="px-3">
          <a href="">
            <span class="nav-text">BLOG</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- Botón -->
    <button class="border border-white rounded-full font-bold px-4 py-2">CONTACTANOS</button>
  </div>
</header>

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
</style>