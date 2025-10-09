@extends('layouts.main')

@section('contenido')

    <div class="relative w-full h-[600px] flex items-center justify-center"
        style="background-image: url('{{ asset($imagenFondo) }}'); background-size: cover; background-position: center;">

        <div class="relative z-10 text-center text-[#19191a]">
            <h1 class="text-6xl font-bold titulo-poppins mb-6">Encuentra El Hogar De Tus Sueños</h1>
            <!-- Buscador de inmuebles -->
            <form
                class="bg-white bg-opacity-80 rounded-xl p-4 flex flex-row justify-between items-center gap-6 w-full max-w-4xl mx-auto shadow-sm"
                method="GET" action="">
                <select
                    class="bg-transparent border-b border-[#00bfae] focus:border-[#404656] px-2 py-1 outline-none flex-1 text-gray-700"
                    name="tipo_operacion" required>
                    <option value="">Operación</option>
                    <option value="comprar">Comprar</option>
                    <option value="alquilar">Alquilar</option>
                    <option value="anticretico">Anticrético</option>
                    <option value="traspaso">Traspaso</option>
                </select>
                <select
                    class="bg-transparent border-b border-[#00bfae] focus:border-[#404656] px-2 py-1 outline-none flex-1 text-gray-700"
                    id="tipo_inmueble" name="tipo_inmueble" required>
                    <option value="">Inmueble</option>
                    <option value="casa">Casa</option>
                    <option value="departamento">Departamento</option>
                    <option value="casa_comercial">Casa Comercial</option>
                    <option value="quinta">Quinta</option>
                    <option value="terreno">Terreno</option>
                </select>
                <select
                    class="bg-transparent border-b border-[#00bfae] focus:border-[#404656] px-2 py-1 outline-none flex-1 text-gray-700"
                    id="zona" name="zona" required>
                    <option value="">Zona</option>
                    <option value="norte">Norte</option>
                    <option value="centro">Centro</option>
                    <option value="sur">Sur</option>
                    <option value="este">Este</option>
                    <option value="oeste">Oeste</option>
                </select>
                <button type="submit"
                    class="bg-[#00bfae] hover:bg-[#404656] transition-colors text-white px-8 py-2 rounded-full font-bold shadow flex-shrink-0">
                    Buscar
                </button>

            </form>
        </div>
    </div>

@endsection
<style>
    .titulo-poppins {
        font-family: 'Poppins', Arial, sans-serif;
    }
</style>