@extends('layouts.main')
@section('contenido')

    <div class=" min-h-screen py-8 ">
        <h3 class="text-3xl  text-center mb-0 mt-2 text-[#404656] titulo-poppins">Inmuebles En
            anticretico</h3>
            <span class="block text-base text-gray-500 text-center mb-8">
            ¡Explora y encuentra tu próximo hogar en nuestra lista de inmuebles disponibles para anticretico!
        </span>
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            @foreach($casas as $casa)
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

                    <span
                        class="inline-block bg-[#f09e02] text-white text-xs px-3 py-1 font-bold rounded mb-2">En {{ ucfirst($casa->tipo) }}</span>

                    <!-- Título y dirección -->
                    <h3 class="font-bold text-lg text-[#404656] mb-1"> {{ mb_strtoupper($casa->titulo) }} EN
                        {{ mb_strtoupper($casa->tipo) }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-2">{{ mb_strtoupper($casa->direccion) }}</p>

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
                    <div class="text-2xl font-bold text-[#404656] mb-2">{{ number_format($casa->precio, 0, ',', '.') }} $us
                        <span class="text-base font-normal text-gray-500">T.C. 7 Bs</span></div>

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
@endsection
<style>
 .titulo-poppins {
    font-family: 'Poppins', Arial, sans-serif;
}
</style>