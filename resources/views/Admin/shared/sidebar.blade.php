<!-- Sidebar Admin -->
<aside id="admin-sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-[#404656] text-white transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col shadow-2xl">
    <!-- Logo Area -->
    <div class="flex items-center justify-center h-16 border-b border-white/10 bg-[#e09129] ">
        <a href="#" class="flex items-center gap-3">
            <img class="h-24 w-24 md:h-32 md:w-48" src="recursos/img/logo-blanco.png" alt="" />
        </a>
    </div>

    <!-- Menu -->
    <nav class="flex-1 overflow-y-auto py-4 px-3">
        <ul class="space-y-1">

            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-[#e09129] hover:text-[#404656] transition-colors duration-200 group">
                    <i class="fas fa-tachometer-alt w-5 text-center group-hover:text-[#404656]"></i>
                    <span class="font-medium menu-font">Dashboard</span>
                </a>
            </li>

            <!-- Casas Submenu -->
            <li>
                <button type="button"
                    class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg hover:bg-[#e09129] hover:text-[#404656] transition-colors duration-200 group sidebar-submenu-btn">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-building w-5 text-center group-hover:text-[#404656]"></i>
                        <span class="font-medium menu-font">Casas</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200 submenu-icon"></i>
                </button>
                <ul class="hidden pl-12 pr-2 py-1 space-y-1 submenu-list">
                    <li>
                        <a href="{{ route('casas.index') }}"
                            class="block px-4 py-2 rounded-lg text-sm hover:bg-white/10 hover:text-[#e09129] transition-colors menu-font">
                            Ver casas
                        </a>
                    </li>

                </ul>
            </li>

            @if(auth()->check() && auth()->user()->rol && auth()->user()->rol->nombre !== 'agente')

                <!-- Agente Submenu -->
                <li>
                    <button type="button"
                        class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg hover:bg-[#e09129] hover:text-[#404656] transition-colors duration-200 group sidebar-submenu-btn">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-house-user w-5 text-center group-hover:text-[#404656]"></i>
                            <span class="font-medium menu-font">Agentes</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200 submenu-icon"></i>
                    </button>
                    <ul class="hidden pl-12 pr-2 py-1 space-y-1 submenu-list">
                        <li>
                            <a href="{{ route('admin.agentes.index') }}"
                                class="block px-4 py-2 rounded-lg text-sm hover:bg-white/10 hover:text-[#e09129] transition-colors menu-font">
                                Ver Agentes inmobiliarios
                            </a>
                        </li>

                    </ul>
                </li>

            @endif
            <!-- Propietarios Submenu -->
            <li>
                <button type="button"
                    class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg hover:bg-[#e09129] hover:text-[#404656] transition-colors duration-200 group sidebar-submenu-btn">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-user-tie w-5 text-center group-hover:text-[#404656]"></i>
                        <span class="font-medium menu-font">Propietarios</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200 submenu-icon"></i>
                </button>
                <ul class="hidden pl-12 pr-2 py-1 space-y-1 submenu-list">
                    <li>
                        <a href="{{ route('propietarios.index') }}"
                            class="block px-4 py-2 rounded-lg text-sm hover:bg-white/10 hover:text-[#e09129] transition-colors menu-font">
                            Listar Propietarios
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Clientes Submenu -->
            <li>
                <button type="button"
                    class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg hover:bg-[#e09129] hover:text-[#404656] transition-colors duration-200 group sidebar-submenu-btn">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-users w-5 text-center group-hover:text-[#404656]"></i>
                        <span class="font-medium menu-font">Clientes</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200 submenu-icon"></i>
                </button>
                <ul class="hidden pl-12 pr-2 py-1 space-y-1 submenu-list">
                    <li>
                        <a href="{{ route('clientes.index') }}"
                            class="block px-4 py-2 rounded-lg text-sm hover:bg-white/10 hover:text-[#e09129] transition-colors menu-font">
                            Ver Clientes
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 rounded-lg text-sm hover:bg-white/10 hover:text-[#e09129] transition-colors menu-font">
                            Registrar Cliente
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Ventas Submenu -->
            <li>
                <button type="button"
                    class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg hover:bg-[#e09129] hover:text-[#404656] transition-colors duration-200 group sidebar-submenu-btn">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-handshake w-5 text-center group-hover:text-[#404656]"></i>
                        <span class="font-medium menu-font">Trasnsacciones</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200 submenu-icon"></i>
                </button>
                <ul class="hidden pl-12 pr-2 py-1 space-y-1 submenu-list">
                    <li>
                        <a href="{{ route('transacciones.index') }}"
                            class="block px-4 py-2 rounded-lg text-sm hover:bg-white/10 hover:text-[#e09129] transition-colors menu-font">
                            Ver Transacciones
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 rounded-lg text-sm hover:bg-white/10 hover:text-[#e09129] transition-colors menu-font">
                            Nuevas Transacción
                        </a>
                    </li>
                </ul>
            </li>

            @if(auth()->check() && auth()->user()->rol && auth()->user()->rol->nombre !== 'agente')
                <!-- Usuarios Submenu -->
                <li>
                    <button type="button"
                        class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg hover:bg-[#e09129] hover:text-[#404656] transition-colors duration-200 group sidebar-submenu-btn">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-user-shield w-5 text-center group-hover:text-[#404656]"></i>
                            <span class="font-medium menu-font">Usuarios</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200 submenu-icon"></i>
                    </button>
                    <ul class="hidden pl-12 pr-2 py-1 space-y-1 submenu-list">
                        <li>
                            <a href="{{ route('usuarios.index') }}"
                                class="block px-4 py-2 rounded-lg text-sm hover:bg-white/10 hover:text-[#e09129] transition-colors menu-font">
                                Listar Usuarios
                            </a>
                        </li>

                    </ul>
                </li>
            @endif
            <li>
                    <button type="button"
                        class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg hover:bg-[#e09129] hover:text-[#404656] transition-colors duration-200 group sidebar-submenu-btn">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-chart-line w-5 text-center group-hover:text-[#404656]"></i>
                            <span class="font-medium menu-font">Reportes</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200 submenu-icon"></i>
                    </button>
                    <ul class="hidden pl-12 pr-2 py-1 space-y-1 submenu-list">
                        <li>
                            <a href="{{ route('reportes.ventasPorAgente') }}"
                                class="block px-4 py-2 rounded-lg text-sm hover:bg-white/10 hover:text-[#e09129] transition-colors menu-font">
                                
                                Reportes de ventas
                            </a>
                        </li>

                    </ul>
                </li>
            @if(auth()->check() && auth()->user()->rol && auth()->user()->rol->nombre !== 'superadministrador')
                <li>
                    <a href="{{ route('agente.perfil') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-[#e09129] hover:text-[#404656] transition-colors duration-200 group">
                        <i class="fas fa-user-cog w-5 text-center group-hover:text-[#404656]"></i>
                        <span class="font-medium menu-font">Configurar perfil</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>

    <!-- Footer / Logout -->
    <div class="p-4 border-t border-white/10">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center gap-2 px-4 py-2 rounded-lg bg-red-500/20 hover:bg-red-500 text-red-300 hover:text-white transition-colors duration-200 menu-font text-sm font-semibold">
                <i class="fas fa-sign-out-alt"></i>
                Cerrar Sesión
            </button>
        </form>
    </div>
</aside>

<!-- Mobile Sidebar Overlay -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden backdrop-blur-sm transition-opacity">
</div>

<style>
    .menu-font {
        font-family: 'Muli', sans-serif;
    }

    /* Custom scrollbar for sidebar */
    #admin-sidebar nav::-webkit-scrollbar {
        width: 4px;
    }

    #admin-sidebar nav::-webkit-scrollbar-track {
        background: transparent;
    }

    #admin-sidebar nav::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 2px;
    }

    #admin-sidebar nav::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.4);
    }
</style>

<script>
    (function () {
        // Toggle sidebar on mobile
        const toggleBtn = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }
        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        if (toggleBtn && sidebar && overlay) {
            toggleBtn.addEventListener('click', function () {
                if (sidebar.classList.contains('-translate-x-full')) {
                    openSidebar();
                } else {
                    closeSidebar();
                }
            });
            overlay.addEventListener('click', closeSidebar);
        }

        // Submenu accordion
        document.querySelectorAll('.sidebar-submenu-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const submenu = this.nextElementSibling;
                const icon = this.querySelector('.submenu-icon');
                if (!submenu) return;

                const isHidden = submenu.classList.contains('hidden');
                // Close all sibling submenus
                const parentLi = this.closest('li');
                const parentUl = parentLi.parentElement;
                parentUl.querySelectorAll('.submenu-list').forEach(function (ul) {
                    if (ul !== submenu) {
                        ul.classList.add('hidden');
                        const otherBtn = ul.previousElementSibling;
                        if (otherBtn) {
                            const otherIcon = otherBtn.querySelector('.submenu-icon');
                            if (otherIcon) otherIcon.classList.remove('rotate-180');
                        }
                    }
                });

                if (isHidden) {
                    submenu.classList.remove('hidden');
                    if (icon) icon.classList.add('rotate-180');
                } else {
                    submenu.classList.add('hidden');
                    if (icon) icon.classList.remove('rotate-180');
                }
            });
        });
    })();
</script>