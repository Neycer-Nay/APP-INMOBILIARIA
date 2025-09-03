<header class="bg-teal-500 text-white shadow">
    <div class="container mx-auto flex items-center justify-between py-3 px-4">
        <!-- Logo y nombre -->
        <div class="flex items-center gap-3">
            <span class="bg-white rounded p-2">
                <!-- Icono de casa SVG -->
                <svg class="w-8 h-8 text-teal-500" fill="currentColor" viewBox="0 0 24 24"><path d="M3 11.5V21h6v-5h6v5h6v-9.5l-9-7-9 7z"/></svg>
            </span>
            <div>
                <span class="font-bold text-2xl">Bien</span>
                <span class="block text-xs text-white">INMUEBLES</span>
            </div>
        </div>
        <!-- Menú principal -->
        <nav class="flex-1 flex items-center justify-center gap-8">
            <a href="#" class="hover:text-gray-200 font-semibold">Inicio</a>
            <!-- Propiedades con submenú -->
            <div class="relative group">
                <button class="hover:text-gray-200 font-semibold focus:outline-none">Propiedades</button>
                <div class="absolute left-0 mt-2 w-40 bg-white text-teal-700 rounded shadow-lg opacity-0 group-hover:opacity-100 transition pointer-events-none group-hover:pointer-events-auto z-10">
                    <a href="#" class="block px-4 py-2 hover:bg-teal-100">Venta</a>
                    <a href="#" class="block px-4 py-2 hover:bg-teal-100">Alquiler</a>
                    <a href="#" class="block px-4 py-2 hover:bg-teal-100">Anticrético</a>
                    <a href="#" class="block px-4 py-2 hover:bg-teal-100">Compra</a>
                </div>
            </div>
            <!-- Servicios con submenú -->
            <div class="relative group">
                <button class="hover:text-gray-200 font-semibold focus:outline-none">Servicios</button>
                <div class="absolute left-0 mt-2 w-56 bg-white text-teal-700 rounded shadow-lg opacity-0 group-hover:opacity-100 transition pointer-events-none group-hover:pointer-events-auto z-10">
                    <a href="#" class="block px-4 py-2 hover:bg-teal-100">Trámites de derecho propietario</a>
                    <a href="#" class="block px-4 py-2 hover:bg-teal-100">Avalúos</a>
                    <a href="#" class="block px-4 py-2 hover:bg-teal-100">Préstamos hipotecarios</a>
                </div>
            </div>
            <!-- Nosotros con submenú -->
            <div class="relative group">
                <button class="hover:text-gray-200 font-semibold focus:outline-none">Nosotros</button>
                <div class="absolute left-0 mt-2 w-44 bg-white text-teal-700 rounded shadow-lg opacity-0 group-hover:opacity-100 transition pointer-events-none group-hover:pointer-events-auto z-10">
                    <a href="#" class="block px-4 py-2 hover:bg-teal-100">Quiénes somos</a>
                    <a href="#" class="block px-4 py-2 hover:bg-teal-100">Misión</a>
                    <a href="#" class="block px-4 py-2 hover:bg-teal-100">Visión</a>
                    <a href="#" class="block px-4 py-2 hover:bg-teal-100">Confianza</a>
                </div>
            </div>
            <a href="#" class="hover:text-gray-200 font-semibold">Blog/Noticias</a>
            <a href="#" class="hover:text-gray-200 font-semibold">Contacto</a>
        </nav>
        <!-- Botones de sesión -->
        <div class="flex items-center gap-2">
            <a href="#" class="flex items-center gap-1 px-3 py-2 rounded hover:bg-teal-600 transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                <span>Iniciar sesión</span>
            </a>
            <a href="#" class="flex items-center gap-1 px-4 py-2 rounded bg-gray-600 text-white hover:bg-gray-700 transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm1 15h-2v-2h2zm0-4h-2V7h2z"/></svg>
                <span>Registrarme</span>
            </a>
        </div>
    </div>
</header>