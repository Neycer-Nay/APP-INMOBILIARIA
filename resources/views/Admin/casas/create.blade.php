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

        <h2 class="text-xl font-semibold mb-6 text-[#404656]">REGISTRAR INMUEBLES</h2>
        <form action="{{ route('casas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Código</label>
                    <input type="text" name="codigo"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Título</label>
                    <input type="text" name="titulo"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tipo</label>
                    <select name="tipo"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                        <option value="">Tipo</option>
                        <option value="venta">Venta</option>
                        <option value="alquiler">Alquiler</option>
                        <option value="anticretico">Anticretico</option>
                        <option value="traspaso">Traspaso</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Zona</label>
                    <select name="zona"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                        <option value="">Zona</option>
                        <option value="norte">Norte</option>
                        <option value="sur">Sur</option>
                        <option value="este">Este</option>
                        <option value="oeste">Oeste</option>
                        <option value="centro">Centro</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Categoría</label>
                    <select name="categoria"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                        <option value="">Categoría</option>
                        <option value="casa">Casa</option>
                        <option value="departamento">Departamento</option>
                        <option value="casa_comercial">Casa Comercial</option>
                        <option value="quinta">Quinta</option>
                        <option value="terreno">Terreno</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Superficie Terreno (m²)</label>
                    <input type="number" step="0.01" name="superficieTerreno"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Superficie Construida (m²)</label>
                    <input type="number" step="0.01" name="superficieConstruida"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Precio</label>
                    <input type="number" step="0.01" name="precio"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Dirección</label>
                    <input type="text" name="direccion"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Ciudad</label>
                    <input type="text" name="ciudad"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Descripción</label>
                    <textarea name="descripcion" rows="2"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500"></textarea>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tiendas</label>
                    <input type="number" name="tiendas" min="0"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Habitaciones</label>
                    <input type="number" name="habitaciones" min="0"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Baños</label>
                    <input type="number" name="banos" min="0"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Garajes</label>
                    <input type="number" name="garajes" min="0"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Plantas</label>
                    <input type="number" name="plantas" min="1"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Estado</label>
                    <select name="estado"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500">
                        <option value="disponible">Disponible</option>
                        <option value="vendido">Vendido</option>
                        <option value="alquilado">Alquilado</option>
                        <option value="entregado">Entregado</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Características Interior (separadas por
                        coma)</label>
                    <input type="text" name="caracteristicas"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500"
                        placeholder="Piscina, Jardín, Seguridad...">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Características Externas (separadas por
                        coma)</label>
                    <input type="text" name="caracteristicasExternas"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500"
                        placeholder="Colegios, Parques, Mercados, Transporte...">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Características Servicios (separadas por
                        coma)</label>
                    <input type="text" name="caracteristicasServicios"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500"
                        placeholder="agua, luz, internet, etc....">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Insertar enlace del video de FB YT</label>
                    <input type="text" name="videoUrl"
                        class="w-full border-b border-blue-300 px-2 py-1 focus:outline-none focus:border-blue-500"
                        placeholder="https://www.youtube.com/watch?v=...">
                </div>

            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Plano de Distribución (JPG/PNG)</label>
                <input type="file" id="plano_distribucion" name="plano_distribucion" accept="image/jpeg,image/png,image/jpg" class="hidden"
                    onchange="previewPlano(event)">
                <div id="planoPreview" class="mb-2"></div>
                <div class="flex gap-2">
                    <button type="button" onclick="document.getElementById('plano_distribucion').click()"
                        class="bg-[#293F5D] hover:bg-blue-800 text-white py-1 px-4 rounded shadow text-sm">Seleccionar
                        Plano</button>
                    <button type="button" onclick="cancelarPlano()"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-1 px-4 rounded shadow text-sm">Cancelar</button>
                </div>
                <small class="text-gray-500">Formatos permitidos: JPG, PNG (máximo 5MB)</small>
            </div>

           

            <div class="mt-6">
                <label class="block text-gray-700 font-semibold mb-2">Fotos (máximo 8)</label>
                <input type="file" id="fotos" name="fotos[]" multiple accept="image/*" class="hidden"
                    onchange="previewFotos(event)">
                <div id="preview" class="flex flex-wrap gap-2 mb-2"></div>
                <input type="hidden" name="foto_principal" id="foto_principal">
                <div class="flex gap-2">
                    <button type="button" onclick="document.getElementById('fotos').click()"
                        class="bg-[#293F5D] hover:bg-blue-800 text-white py-1 px-4 rounded shadow text-sm">Seleccionar
                        Fotos</button>
                    <button type="button" onclick="cancelarFotos()"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-1 px-4 rounded shadow text-sm">Cancelar</button>
                </div>
                <small>Seleciona en el circulo la foto principal</small>
            </div>

            <div class="mt-8 flex justify-end gap-2">
                <a href="{{ route('casas.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-6 rounded shadow text-sm">Cancelar</a>
                <button type="submit"
                    class="bg-[#293F5D] hover:bg-blue-800 text-white font-bold py-2 px-6 rounded shadow text-sm">
                    Guardar Casa
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewFotos(event) {
            const preview = document.getElementById('preview');
            preview.innerHTML = '';
            const files = event.target.files;
            if (files.length > 8) {
                alert('Solo puedes seleccionar hasta 8 fotos.');
                event.target.value = '';
                return;
            }
            Array.from(files).forEach((file, idx) => {
                const reader = new FileReader();
                reader.onload = e => {
                    const div = document.createElement('div');
                    div.className = "relative flex flex-col items-center";
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = "h-20 w-20 object-cover rounded border mb-1";
                    // Radio para seleccionar principal
                    const radio = document.createElement('input');
                    radio.type = 'radio';
                    radio.name = 'select_principal';
                    radio.value = idx;
                    radio.className = "mb-1";
                    radio.onclick = function () {
                        document.getElementById('foto_principal').value = idx;
                    };
                    // Etiqueta
                    const label = document.createElement('label');
                    label.innerText = ' ';
                    label.className = "text-xs";
                    div.appendChild(img);
                    div.appendChild(radio);
                    div.appendChild(label);
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
            // Por defecto, selecciona la primera como principal
            document.getElementById('foto_principal').value = 0;
        }

        function cancelarFotos() {
            document.getElementById('fotos').value = '';
            document.getElementById('preview').innerHTML = '';
            document.getElementById('foto_principal').value = '';
        }

        function previewPlano(event) {
            const preview = document.getElementById('planoPreview');
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
                    label.innerText = 'Plano de Distribución';
                    label.className = "text-xs text-gray-600";
                    
                    div.appendChild(img);
                    div.appendChild(label);
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            }
        }

        function cancelarPlano() {
            document.getElementById('plano_distribucion').value = '';
            document.getElementById('planoPreview').innerHTML = '';
        }
    </script>
@endsection