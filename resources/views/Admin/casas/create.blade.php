@extends('layouts.main') 

@section('contenido')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8">
    <h2 class="text-2xl font-bold mb-6 text-blue-700">Registrar Nueva Casa</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Código</label>
                <input type="number" name="codigo" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Tipo</label>
                <select name="tipo" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="venta">Venta</option>
                    <option value="alquiler">Alquiler</option>
                    <option value="anticretico">Anticretico</option>
                    <option value="traspaso">Traspaso</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Zona</label>
                <select name="zona" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="norte">Norte</option>
                    <option value="sur">Sur</option>
                    <option value="este">Este</option>
                    <option value="oeste">Oeste</option>
                    <option value="centro">Centro</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Categoría</label>
                <select name="categoria" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="casa">Casa</option>
                    <option value="departamento">Departamento</option>
                    <option value="comercial">Comercial</option>
                    <option value="quinta">Quinta</option>
                    <option value="terreno">Terreno</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Superficie Terreno (m²)</label>
                <input type="number" step="0.01" name="superficieTerreno" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Superficie Construida (m²)</label>
                <input type="number" step="0.01" name="superficieConstruida" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Precio</label>
                <input type="number" step="0.01" name="precio" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Dirección</label>
                <input type="text" name="direccion" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Ciudad</label>
                <input type="text" name="ciudad" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Descripción</label>
                <textarea name="descripcion" rows="3" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Habitaciones</label>
                <input type="number" name="habitaciones" min="0" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Baños</label>
                <input type="number" name="banos" min="0" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Garajes</label>
                <input type="number" name="garajes" min="0" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Plantas</label>
                <input type="number" name="plantas" min="1" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Estado</label>
                <select name="estado" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="disponible">Disponible</option>
                    <option value="vendido">Vendido</option>
                    <option value="alquilado">Alquilado</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Características (separadas por coma)</label>
                <input type="text" name="caracteristicas" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Piscina, Jardín, Seguridad...">
            </div>
            <div class="col-span-2">
                <label class="block text-gray-700 font-semibold mb-2">Fotos (máximo 8)</label>
                <input type="file" name="fotos[]" multiple accept="image/*" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded shadow">
                Guardar Casa
            </button>
        </div>
    </form>
</div>
@endsection