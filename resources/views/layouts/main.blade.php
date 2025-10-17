<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa y chalet</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

    <!-- Choices.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <!-- Choices.js JS -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    
</head>

<body fuente-gral style='background-color: #fffaf3  ;'>
    @include('shared.header')


    @yield('contenido')


    @include('shared.footer')

    @stack('scripts')
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const BREAKPOINT = 768; // <= este ancho = móvil (ajusta si hace falta)
            const elems = Array.from(document.querySelectorAll('[data-aos]'));

            // Guardar animación original para poder restaurarla al salir de móvil
            elems.forEach(el => {
                if (!el.dataset.aosOriginal) {
                    el.dataset.aosOriginal = el.getAttribute('data-aos') || 'fade-up';
                }
            });

            function applyMobileAos() {
                const isMobile = window.innerWidth <= BREAKPOINT;
                elems.forEach(el => {
                    if (isMobile) {
                        el.setAttribute('data-aos', 'fade-up'); // siempre desde abajo
                        el.setAttribute('data-aos-anchor-placement', 'bottom-bottom');
                    } else {
                        // restaurar animación original en escritorio
                        el.setAttribute('data-aos', el.dataset.aosOriginal);
                        el.removeAttribute('data-aos-anchor-placement');
                    }
                });
            }

            // aplicar antes de inicializar AOS para que lea los atributos correctos
            applyMobileAos();

            AOS.init({
                once: false,
                duration: 700,
                easing: 'ease',
                offset: 120
            });

            // al cambiar tamaño, reaplicar y refrescar AOS (debounce)
            let resizeTimer;
            window.addEventListener('resize', function () {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function () {
                    applyMobileAos();
                    AOS.refresh();
                }, 150);
            });
        });
    </script>
</body>

</html>

<style>
    body {
        font-family: 'Muli', sans-serif;
    }
</style>