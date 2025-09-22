@extends('layouts.main')

@section('contenido')

    <div class="relative w-full h-[600px] flex items-center justify-center"
        style="background-image: url('{{ asset($imagenFondo) }}'); background-size: cover; background-position: center;">

        <div class="relative z-10 text-center text-[#404656]">
            <h1 class="text-6xl font-bold mb-6">Aquí Comienza Tu Nueva Vida</h1>
            <!-- Buscador de inmuebles -->
            <form
                class="bg-white bg-opacity-90 rounded-lg p-6 flex flex-col md:flex-row items-center gap-4 w-full max-w-3xl mx-auto">
                <select class="p-2 rounded border" name="tipo">
                    <option>Comprar</option>
                    <option>Alquilar</option>
                </select>
                <select class="p-2 rounded border" name="ciudad">
                    <option>Santa Cruz</option>
                    <option>Cochabamba</option>
                    <option>La Paz</option>
                </select>
                <input type="text" class="p-2 rounded border flex-1" name="zona" placeholder="Zona/Barrio, Ciudad">
                <button type="submit" class="bg-[#00bfae] text-white px-6 py-2 rounded font-bold">Buscar</button>
            </form>
        </div>
    </div>

@endsection