<!-- Botones flotantes de navegación rápida -->
<div class="fixed right-4 top-1/2 transform -translate-y-1/2 z-50 flex flex-col space-y-3">
  <!-- Botón para crear casa -->
  <div class="floating-btn-container group">
    <a href="{{ route('casas.create') }}" 
       
       title="Añadir Casa">
      <i class="fas fa-plus-circle text-[#404656] text-lg"></i>
    </a>
    <!-- Tooltip -->
   
  </div>

  <!-- Botón para ver listado de casas -->
  <div class="floating-btn-container group">
    <a href="{{ route('casas.index') }}" 
      
       title="Ver casas">
      <i class="fas fa-list text-[#404656] text-lg"></i>
    </a>
    <!-- Tooltip -->
    
  </div>

  <!-- Botón para iniciar sesión -->
  <div class="floating-btn-container group">
    <a href="{{ route('login') }}" 
       
       title="Iniciar Sesión">
      <i class="fas fa-user text-[#404656] text-lg"></i>
    </a>
    <!-- Tooltip -->
   
  </div>
</div>

<!-- Estilos para los botones flotantes -->
<style>
  .floating-btn-container {
    position: relative;
  }

  .floating-btn {
    @apply w-12 h-12 rounded-full shadow-lg flex items-center justify-center transition-all duration-300 transform hover:scale-110;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.1);
  }

  .floating-tooltip {
    @apply absolute right-full mr-3 top-1/2 transform -translate-y-1/2 translate-x-2 opacity-0 transition-all duration-300;
    @apply bg-gray-800 text-white text-sm px-3 py-2 rounded-lg whitespace-nowrap;
    @apply shadow-lg pointer-events-none;
    z-index: 60;
  }

  .floating-tooltip::after {
    content: '';
    @apply absolute left-full top-1/2 transform -translate-y-1/2;
    border: 6px solid transparent;
    border-left-color: #1f2937;
  }

  /* Animación sutil de entrada */
  .floating-btn-container {
    animation: fadeInFloat 0.6s ease-out;
  }

  .floating-btn-container:nth-child(1) { animation-delay: 0.1s; }
  .floating-btn-container:nth-child(2) { animation-delay: 0.2s; }
  .floating-btn-container:nth-child(3) { animation-delay: 0.3s; }

  @keyframes fadeInFloat {
    0% {
      opacity: 0;
      transform: translateX(30px);
    }
    100% {
      opacity: 1;
      transform: translateX(0);
    }
  }

  /* Responsive: ocultar en pantallas muy pequeñas */
  @media (max-width: 480px) {
    .floating-btn-container {
    display: flex; /* Asegúrate de que los botones sean visibles */
  }

  .floating-btn {
    @apply w-10 h-10; /* Reduce el tamaño de los botones */
  }

  .floating-btn i {
    @apply text-sm; /* Reduce el tamaño de los íconos */
  }

  .floating-tooltip {
    @apply text-xs px-2 py-1; /* Ajusta el tamaño del tooltip */
  }
  }

  /* Ajuste para tablets */
  @media (max-width: 768px) {
    .floating-btn {
      @apply w-10 h-10;
    }
    
    .floating-btn i {
      @apply text-base;
    }

    .floating-tooltip {
      @apply text-xs px-2 py-1;
    }
  }
</style>