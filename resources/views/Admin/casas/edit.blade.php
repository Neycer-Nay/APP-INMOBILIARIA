@extends('layouts.main')

@section('contenido')

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="text-red-500 hover:underline bg-transparent border-0 p-0">
            Cerrar sesión
        </button>
    </form>
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-6 mt-8 mb-8 ">
        <h2 class="text-xl font-semibold mb-6 text-[#404656]">EDITAR INMUEBLE</h2>
        <form action="{{ route('casas.update', $casa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Código</label>
                    <input type="text" name="codigo" value="{{ $casa->codigo }}"
                        class="w-full border-b border-blue-300 px-2 py-1 bg-gray-100" readonly>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Título</label>
                    <input type="text" name="titulo" value="{{ $casa->titulo }}"
                        class="w-full border-b border-blue-300 px-2 py-1 bg-gray-100" readonly>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tipo</label>
                    <select name="tipo"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                        <option value="">Tipo</option>
                        <option value="venta" {{ $casa->tipo == 'venta' ? 'selected' : '' }}>Venta</option>
                        <option value="alquiler" {{ $casa->tipo == 'alquiler' ? 'selected' : '' }}>Alquiler</option>
                        <option value="anticretico" {{ $casa->tipo == 'anticretico' ? 'selected' : '' }}>Anticretico</option>
                        <option value="traspaso" {{ $casa->tipo == 'traspaso' ? 'selected' : '' }}>Traspaso</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Zona</label>
                    <select name="zona"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                        <option value="">Zona</option>
                        <option value="norte" {{ $casa->zona == 'norte' ? 'selected' : '' }}>Norte</option>
                        <option value="sur" {{ $casa->zona == 'sur' ? 'selected' : '' }}>Sur</option>
                        <option value="este" {{ $casa->zona == 'este' ? 'selected' : '' }}>Este</option>
                        <option value="oeste" {{ $casa->zona == 'oeste' ? 'selected' : '' }}>Oeste</option>
                        <option value="centro" {{ $casa->zona == 'centro' ? 'selected' : '' }}>Centro</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Categoría</label>
                    <select name="categoria"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                        <option value="">Categoría</option>
                        <option value="casa" {{ $casa->categoria == 'casa' ? 'selected' : '' }}>Casa</option>
                        <option value="departamento" {{ $casa->categoria == 'departamento' ? 'selected' : '' }}>Departamento
                        </option>
                        <option value="casa_comercial" {{ $casa->categoria == 'casa_comercial' ? 'selected' : '' }}>Casa
                            Comercial</option>
                        <option value="quinta" {{ $casa->categoria == 'quinta' ? 'selected' : '' }}>Quinta</option>
                        <option value="terreno" {{ $casa->categoria == 'terreno' ? 'selected' : '' }}>Terreno</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Superficie Terreno (m²)</label>
                    <input type="number" step="0.01" name="superficieTerreno"
                        value="{{ old('superficieTerreno', $casa->superficieTerreno) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Superficie Construida (m²)</label>
                    <input type="number" step="0.01" name="superficieConstruida"
                        value="{{ old('superficieConstruida', $casa->superficieConstruida) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Precio</label>
                    <input type="number" step="0.01" name="precio" value="{{ old('precio', $casa->precio) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Dirección</label>
                    <input type="text" name="direccion" value="{{ old('direccion', $casa->direccion) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Ciudad</label>
                    <input type="text" name="ciudad" value="{{ $casa->ciudad }}"
                        class="w-full border-b border-blue-300 px-2 py-1 bg-gray-100" readonly>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Descripción</label>
                    <textarea name="descripcion" rows="2" class="w-full border-b border-blue-300 px-2 py-1 bg-gray-100"
                        readonly>{{ $casa->descripcion }}</textarea>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tiendas</label>
                    <input type="number" name="tiendas" min="0" value="{{ old('tiendas', $casa->tiendas) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Habitaciones</label>
                    <input type="number" name="habitaciones" min="0" value="{{ old('habitaciones', $casa->habitaciones) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Baños</label>
                    <input type="number" name="banos" min="0" value="{{ old('banos', $casa->banos) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Garajes</label>
                    <input type="number" name="garajes" min="0" value="{{ old('garajes', $casa->garajes) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Plantas</label>
                    <input type="number" name="plantas" min="1" value="{{ old('plantas', $casa->plantas) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Estado</label>
                    <select name="estado"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500">
                        <option value="disponible" {{ $casa->estado == 'disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="vendido" {{ $casa->estado == 'vendido' ? 'selected' : '' }}>Vendido</option>
                        <option value="alquilado" {{ $casa->estado == 'alquilado' ? 'selected' : '' }}>Alquilado</option>
                        <option value="entregado" {{ $casa->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Características Interior (separadas por
                        coma)</label>
                    <input type="text" name="caracteristicas"
                        value="{{ old('caracteristicas', is_array($casa->caracteristicas) ? implode(', ', $casa->caracteristicas) : $casa->caracteristicas) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500"
                        placeholder="Piscina, Jardín, Seguridad...">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Características Externas (separadas por
                        coma)</label>
                    <input type="text" name="caracteristicasExternas"
                        value="{{ old('caracteristicasExternas', is_array($casa->caracteristicasExternas) ? implode(', ', $casa->caracteristicasExternas) : $casa->caracteristicasExternas) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500"
                        placeholder="Colegios, Parques, Mercados, Transporte...">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Características Servicios (separadas por
                        coma)</label>
                    <input type="text" name="caracteristicasServicios"
                        value="{{ old('caracteristicasServicios', is_array($casa->caracteristicasServicios) ? implode(', ', $casa->caracteristicasServicios) : $casa->caracteristicasServicios) }}"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500"
                        placeholder="agua, luz, internet, etc....">
                </div>
            </div>
            
            <div class="mt-6">
                <label class="block text-gray-700 font-semibold mb-2">Actualizar enlace del video de FB YT</label>
                <input type="text" name="videoUrl" value="{{ old('videoUrl', $casa->videoUrl) }}"
                    class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500"
                    placeholder="https://www.youtube.com/watch?v=...">
            </div>

            <div class="mt-6">
                <label class="block text-gray-700 font-semibold mb-2">Plano de Distribución Actual</label>
                @if($casa->plano_distribucion)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . ltrim($casa->plano_distribucion, '/')) }}"
                             alt="Plano de Distribución Actual"
                             class="h-32 w-auto object-cover rounded border">
                        <p class="text-xs text-gray-500 mt-1">Plano actual</p>
                    </div>
                @else
                    <p class="text-gray-500 mb-4">No hay plano de distribución registrado.</p>
                @endif
                
                <label class="block text-gray-700 font-semibold mb-2">Actualizar Plano de Distribución (JPG/PNG)</label>
                <input type="file" id="plano_distribucion_edit" name="plano_distribucion" accept="image/jpeg,image/png,image/jpg" class="hidden"
                    onchange="previewPlanoEdit(event)">
                <div id="planoPreviewEdit" class="mb-2"></div>
                <div class="flex gap-2">
                    <button type="button" onclick="document.getElementById('plano_distribucion_edit').click()"
                        class="bg-[#293F5D] hover:bg-blue-800 text-white py-1 px-4 rounded shadow text-sm">Seleccionar
                        Nuevo Plano</button>
                    <button type="button" onclick="cancelarPlanoEdit()"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-1 px-4 rounded shadow text-sm">Cancelar</button>
                </div>
                <small class="text-gray-500">Formatos permitidos: JPG, PNG (máximo 5MB). Deja vacío si no deseas cambiar el plano.</small>
            </div>

            <div class="mt-6">
                <label class="block text-gray-700 font-semibold mb-2">Fotos</label>
                <div class="flex flex-wrap gap-2 mb-2">
                    @forelse($casa->fotos as $foto)
                        <div class="relative flex flex-col items-center">
                            <img src="{{ asset('storage/' . ltrim($foto->ruta_imagen, '/')) }}"
                                class="h-20 w-20 object-cover rounded border mb-1" alt="Foto casa">
                            @if($foto->foto_principal)
                                <span class="text-xs text-blue-600 font-bold">Principal</span>
                            @endif
                        </div>
                    @empty
                        <span class="text-gray-500">Sin fotos</span>
                    @endforelse
                </div>
                <small class="text-gray-500">Las fotos no se pueden editar desde aquí.</small>
            </div>

            <div class="mt-8 flex justify-end gap-2">
                <a href="{{ route('casas.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-6 rounded shadow text-sm">Cancelar</a>
                <button type="submit"
                    class="bg-[#293F5D] hover:bg-blue-800 text-white font-bold py-2 px-6 rounded shadow text-sm">
                    Actualizar Casa
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewPlanoEdit(event) {
            const preview = document.getElementById('planoPreviewEdit');
            preview.innerHTML = '';
            const file = event.target.files[0];
            
            if (file) {
                // Validar tamaño (máximo 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('El archivo es muy grande. Máximo 5MB permitido.');
                    event.target.value = '';
                    return;
                }
                
                // Validar tipo de archivo
                if (!['image/jpeg', 'image/png', 'image/jpg'].includes(file.type)) {
                    alert('Solo se permiten archivos JPG y PNG.');
                    event.target.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = e => {
                    const div = document.createElement('div');
                    div.className = "relative flex flex-col items-center";
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = "h-32 w-auto object-cover rounded border mb-1";
                    
                    const label = document.createElement('label');
                    label.innerText = 'Nuevo Plano de Distribución';
                    label.className = "text-xs text-gray-600";
                    
                    div.appendChild(img);
                    div.appendChild(label);
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            }
        }

        function cancelarPlanoEdit() {
            document.getElementById('plano_distribucion_edit').value = '';
            document.getElementById('planoPreviewEdit').innerHTML = '';
        }
    </script>
@endsection