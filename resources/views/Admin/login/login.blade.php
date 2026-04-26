<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('recursos/img/LOGO-BLANCO.png') }}">
    <title>Inicio de Sesión - Casa y chalet</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#fffaf3] min-h-screen flex items-center justify-center p-4" style="font-family: 'Muli', sans-serif;">

    <div class="w-full max-w-md">
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header with brand color -->
            <div class="bg-[#e09129] px-8 py-1 text-center">
                
            </div>

            <!-- Form -->
            <div class="px-8 py-8">
                <h2 class="text-xl font-bold text-[#404656] mb-6 text-center menu-font">Inicio de Sesión</h2>

                @if ($errors->any())
                    <div class="mb-5 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
                            <ul class="text-sm text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-[#404656] mb-2 menu-font">Correo electrónico</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-[#e09129]">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#e09129] focus:ring-2 focus:ring-[#e09129]/20 transition-all duration-200 menu-font"
                                placeholder="admin@ejemplo.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#404656] mb-2 menu-font">Contraseña</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-[#e09129]">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password" id="password" required
                                class="w-full pl-10 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#e09129] focus:ring-2 focus:ring-[#e09129]/20 transition-all duration-200 menu-font"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-[#e09129] transition-colors focus:outline-none">
                                <i class="fas fa-eye" id="eye-icon"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#404656] hover:bg-[#2c3240] text-white font-bold py-3 px-4 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 menu-font tracking-wide">
                        <i class="fas fa-sign-in-alt mr-2"></i> Ingresar
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <a href="{{ route('inicio') }}" class="inline-flex items-center gap-2 text-sm text-[#404656] hover:text-[#e09129] transition-colors menu-font">
                        <i class="fas fa-arrow-left text-xs"></i>
                        Volver al sitio web
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-400 mt-6 menu-font">
            © {{ date('Y') }} Casa y Chalet. Todos los derechos reservados.
        </p>
    </div>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(isset($success))
                Swal.fire({
                    title: '¡Éxito!',
                    text: "{{ $success }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif

            @if(isset($error))
                Swal.fire({
                    title: 'Error',
                    text: "{{ $error }}",
                    icon: 'error',
                    confirmButtonText: 'Entendido'
                });
            @endif

            @if(isset($warning))
                Swal.fire({
                    title: 'Advertencia',
                    text: "{{ $warning }}",
                    icon: 'warning',
                    confirmButtonText: 'Revisar'
                });
            @endif

            @if(isset($info))
                Swal.fire({
                    title: 'Información',
                    text: "{{ $info }}",
                    icon: 'info',
                    confirmButtonText: 'OK'
                });
            @endif

            @if($errors->any())
                Swal.fire({
                    title: 'Errores de validación',
                    html: `
                        <ul style="text-align:left;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    `,
                    icon: 'error',
                    confirmButtonText: 'Corregir'
                });
            @endif
        });
   
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eye-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
    
</body>

</html>

<style>
    .menu-font { font-family: 'Muli', sans-serif; }
</style>

