<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('recursos/img/LOGO-BLANCO.png') }}">
    <title>Panel de Administración - Casa y chalet</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body class="bg-[#fffaf3] text-gray-800" style="font-family: 'Muli', sans-serif;">

    <!-- Sidebar -->
    @include('Admin.shared.sidebar')

    <!-- Main Content Wrapper -->
    <div class="md:ml-64 min-h-screen flex flex-col transition-all duration-300">

        <!-- Top Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 h-16 flex items-center justify-between px-4 md:px-8 sticky top-0 z-30">
            <div class="flex items-center gap-4">
                <button id="sidebar-toggle" class="md:hidden p-2 rounded-lg text-[#404656] hover:bg-[#e09129]/20 transition-colors focus:outline-none">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20">
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
                <h1 class="text-lg md:text-xl font-bold text-[#404656] menu-font tracking-wide">
                    PANEL DE ADMINISTRACIÓN
                </h1>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden md:flex items-center gap-3 bg-[#e09129]/10 px-4 py-1.5 rounded-full">
                    <div class="w-8 h-8 rounded-full bg-[#404656] flex items-center justify-center text-white text-sm font-bold">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="text-sm font-semibold text-[#404656] menu-font">
                        {{ auth()->check() ? auth()->user()->name : 'Invitado' }}
                    </span>
                </div>
                <a href="{{ route('inicio') }}" target="_blank" class="p-2 rounded-lg text-[#404656] hover:bg-[#e09129]/20 transition-colors" title="Ver sitio web">
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
        </header>

        <!-- Content Area -->
        <main class="flex-1 p-4 md:p-8 overflow-x-hidden">
            @yield('contenido')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 py-4 px-4 md:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between text-sm text-gray-500">
                <span class="menu-font">© {{ date('Y') }} Casa y Chalet. Todos los derechos reservados.</span>
                <span class="menu-font mt-1 md:mt-0">Panel Administrativo</span>
            </div>
        </footer>

    </div>

    @stack('scripts')
</body>

</html>

<style>
    .menu-font { font-family: 'Muli', sans-serif; }
</style>

