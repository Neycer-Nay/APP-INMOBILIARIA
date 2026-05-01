@extends('Admin.layouts.main')

@section('contenido')
    <div class="max-w-7xl mx-auto py-2 px-2">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-[#404656]">Listado de Casas</h2>
            <button type="button" onclick="openModal('createModal')"
                class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold uppercase">
                <i class="fas fa-plus mr-1"></i> Nueva Casa
            </button>
        </div>

        <div class="overflow-x-auto rounded-2xl">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead>
                    <tr class="bg-[#404656] text-white">
                        <th class="py-3 px-4 text-left">Agente</th>
                        <th class="py-3 px-4 text-left">Categoría</th>
                        <th class="py-3 px-4 text-left">Tipo</th>
                        <th class="py-3 px-4 text-left">Zona</th>
                        <th class="py-3 px-4 text-left">Propietario</th>
                        <th class="py-3 px-4 text-left">Dirección</th>
                        <th class="py-3 px-4 text-left">Código</th>
                        <th class="py-3 px-4 text-left">Precio</th>
                        <th class="py-3 px-4 text-left">Estado</th>
                        <th class="py-3 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($casas as $casa)
                        <tr class="border-b">
                            @if(!Auth::user()->agente)
                            @endif
                            <td class="py-2 px-4">
                                {{ $casa->agente ? $casa->agente->user->name : '—' }}
                            </td>
                            <td class="py-2 px-4">{{ mb_strtoupper(str_replace('_', ' ', $casa->categoria)) }}</td>
                            <td class="py-2 px-4">{{ mb_strtoupper($casa->tipo) }}</td>
                            <td class="py-2 px-4">{{ mb_strtoupper($casa->zona) }}</td>
                            <td class="py-2 px-4">
                                {{ $casa->propietario ? $casa->propietario->nombre . ' ' . $casa->propietario->apellido : '—' }}
                            </td>
                            <td class="py-2 px-4">{{ mb_strtoupper($casa->direccion) }}</td>
                            <td class="py-2 px-4">{{ $casa->codigo }}</td>
                            <td class="py-2 px-4">
                                {{ number_format($casa->precio, 0, ',', '.') }}
                                {{ $casa->tipo == 'alquiler' ? 'Bs' : '$us' }}
                            </td>
                            <td class="py-2 px-4">{{ $casa->estado }}</td>
                            <td class="py-2 px-4">
                                
                                <button type="button"
                                    class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 text-sm"
                                    title="Editar" onclick="openEditModal(this)"
                                    data-action="{{ route('casas.update', $casa->id) }}" data-casa-id="{{ $casa->id }}"
                                    data-codigo="{{ $casa->codigo }}" data-titulo="{{ $casa->titulo }}"
                                    data-tipo="{{ $casa->tipo }}" data-zona="{{ $casa->zona }}"
                                    data-categoria="{{ $casa->categoria }}"
                                    data-superficie-terreno="{{ $casa->superficieTerreno }}"
                                    data-superficie-construida="{{ $casa->superficieConstruida }}"
                                    data-precio="{{ $casa->precio }}" data-direccion="{{ $casa->direccion }}"
                                    data-ciudad="{{ $casa->ciudad }}" data-descripcion="{{ $casa->descripcion }}"
                                    data-tiendas="{{ $casa->tiendas }}" data-habitaciones="{{ $casa->habitaciones }}"
                                    data-banos="{{ $casa->banos }}" data-garajes="{{ $casa->garajes }}"
                                    data-plantas="{{ $casa->plantas }}" data-estado="{{ $casa->estado }}"
                                    data-caracteristicas="{{ is_array($casa->caracteristicas) ? implode(', ', $casa->caracteristicas) : $casa->caracteristicas }}"
                                    data-caracteristicas-externas="{{ is_array($casa->caracteristicasExternas) ? implode(', ', $casa->caracteristicasExternas) : $casa->caracteristicasExternas }}"
                                    data-caracteristicas-servicios="{{ is_array($casa->caracteristicasServicios) ? implode(', ', $casa->caracteristicasServicios) : $casa->caracteristicasServicios }}"
                                    data-videourl="{{ $casa->videoUrl }}"
                                    data-propietario-text="{{ $casa->propietario ? $casa->propietario->nombre . ' ' . $casa->propietario->apellido : '—' }}"
                                    data-agente-text="{{ $casa->agente ? $casa->agente->user->name : '—' }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center text-gray-500 py-6">
                                No hay casas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Crear Casa --}}
    <div id="createModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeModal('createModal')">
        </div>
        <div class="flex min-h-screen items-start justify-center p-4 pt-10 text-center sm:p-0 overflow-y-auto">
            <div
                class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
                <div class="bg-white px-6 pb-6 pt-5 max-h-[90vh] overflow-y-auto">
                    <div class="flex items-center justify-between mb-6 border-b pb-4 sticky top-0 bg-white z-10">
                        <h3 class="text-2xl font-bold text-[#404656]" id="modal-title">Registrar Casa</h3>
                        <button type="button" onclick="closeModal('createModal')"
                            class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    @if ($errors->any() && !old('from_casa_modal'))
                        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded text-sm">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="createForm" action="{{ route('casas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Código</label>
                                <input type="text" name="codigo" value="AUTO" readonly
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 text-gray-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Título <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="titulo" value="{{ old('titulo') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                @error('titulo')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                                <select name="estado"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                                    <option value="disponible" @selected(old('estado', 'disponible') === 'disponible')>
                                        Disponible</option>
                                    <option value="vendido" @selected(old('estado') === 'vendido')>Vendido</option>
                                    <option value="alquilado" @selected(old('estado') === 'alquilado')>Alquilado</option>
                                    <option value="entregado" @selected(old('estado') === 'entregado')>Entregado</option>
                                </select>
                                @error('estado')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Propietario <span
                                        class="text-red-500">*</span></label>
                                <div class="flex gap-2">
                                    <select name="propietario_id" id="create_propietario_id"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                        required>
                                        <option value="">Seleccione un propietario</option>
                                        @foreach($propietarios as $p)
                                            <option value="{{ $p->id }}" @selected(old('propietario_id') == $p->id)>
                                                {{ $p->nombre }} {{ $p->apellido }} - {{ $p->documento }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" onclick="openNestedModal()"
                                        class="bg-[#e09129] hover:bg-[#c57d1f] text-white px-3 py-2 rounded text-sm font-semibold shrink-0"
                                        title="Nuevo propietario">
                                        <i class="fas fa-user-plus"></i>
                                    </button>
                                </div>
                                @error('propietario_id')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        @php
                            $user = Auth::user();
                        @endphp
                        @if($user->rol->nombre === 'superadministrador')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Agente <span
                                            class="text-red-500">*</span></label>
                                    <select name="agente_id" id="create_agente_id"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                        required>
                                        <option value="">Seleccione un agente</option>
                                        @foreach($agentes as $a)
                                            <option value="{{ $a->id }}" @selected(old('agente_id') == $a->id)>
                                                {{ $a->user->name ?? 'Sin nombre' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('agente_id')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tipo <span
                                        class="text-red-500">*</span></label>
                                <select name="tipo"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                    <option value="venta" @selected(old('tipo') === 'venta')>Venta</option>
                                    <option value="alquiler" @selected(old('tipo') === 'alquiler')>Alquiler</option>
                                    <option value="anticretico" @selected(old('tipo') === 'anticretico')>Anticretico</option>
                                    <option value="traspaso" @selected(old('tipo') === 'traspaso')>Traspaso</option>
                                </select>
                                @error('tipo')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Zona <span
                                        class="text-red-500">*</span></label>
                                <select name="zona"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                    <option value="">Zona</option>
                                    <option value="norte" @selected(old('zona') === 'norte')>Norte</option>
                                    <option value="sur" @selected(old('zona') === 'sur')>Sur</option>
                                    <option value="este" @selected(old('zona') === 'este')>Este</option>
                                    <option value="oeste" @selected(old('zona') === 'oeste')>Oeste</option>
                                    <option value="centro" @selected(old('zona') === 'centro')>Centro</option>
                                </select>
                                @error('zona')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Categoría <span
                                        class="text-red-500">*</span></label>
                                <select name="categoria"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                    <option value="">Categoría</option>
                                    <option value="casa" @selected(old('categoria') === 'casa')>Casa</option>
                                    <option value="departamento" @selected(old('categoria') === 'departamento')>Departamento
                                    </option>
                                    <option value="casa_comercial" @selected(old('categoria') === 'casa_comercial')>Casa
                                        Comercial</option>
                                    <option value="quinta" @selected(old('categoria') === 'quinta')>Quinta</option>
                                    <option value="terreno" @selected(old('categoria') === 'terreno')>Terreno</option>
                                </select>
                                @error('categoria')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Superficie Terreno (m²) <span
                                        class="text-red-500">*</span></label>
                                <input type="number" step="0.01" name="superficieTerreno"
                                    value="{{ old('superficieTerreno') }}" min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                @error('superficieTerreno')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Superficie Construida (m²) <span
                                        class="text-red-500">*</span></label>
                                <input type="number" step="0.01" name="superficieConstruida"
                                    value="{{ old('superficieConstruida') }}" min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                @error('superficieConstruida')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Precio <span
                                        class="text-red-500">*</span></label>
                                <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                @error('precio')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Dirección <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="direccion" value="{{ old('direccion') }}" maxlength="255"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                @error('direccion')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Ciudad <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="ciudad" value="{{ old('ciudad') }}" maxlength="100"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                @error('ciudad')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción <span
                                        class="text-red-500">*</span></label>
                                <textarea name="descripcion" rows="2"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tiendas <span
                                        class="text-red-500">*</span></label>
                                <input type="number" name="tiendas" min="0" value="{{ old('tiendas') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                @error('tiendas')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Habitaciones <span
                                        class="text-red-500">*</span></label>
                                <input type="number" name="habitaciones" min="0" value="{{ old('habitaciones') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                @error('habitaciones')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Baños <span
                                        class="text-red-500">*</span></label>
                                <input type="number" name="banos" min="0" value="{{ old('banos') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                @error('banos')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Garajes</label>
                                <input type="number" name="garajes" min="0" value="{{ old('garajes') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                                @error('garajes')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Plantas</label>
                                <input type="number" name="plantas" min="0" value="{{ old('plantas') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                                @error('plantas')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Características Interior
                                    (separadas por coma)</label>
                                <input type="text" name="caracteristicas" value="{{ old('caracteristicas') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    placeholder="Piscina, Jardín, Seguridad...">
                                @error('caracteristicas')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Características Externas
                                    (separadas por coma)</label>
                                <input type="text" name="caracteristicasExternas"
                                    value="{{ old('caracteristicasExternas') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    placeholder="Colegios, Parques, Mercados, Transporte...">
                                @error('caracteristicasExternas')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Características Servicios
                                    (separadas por coma)</label>
                                <input type="text" name="caracteristicasServicios"
                                    value="{{ old('caracteristicasServicios') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    placeholder="Agua, luz, internet, etc...">
                                @error('caracteristicasServicios')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Insertar enlace del video de FB
                                    o YT</label>
                                <input type="url" name="videoUrl" value="{{ old('videoUrl') }}" maxlength="1000"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    placeholder="https://www.youtube.com/watch?v=...">
                                @error('videoUrl')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Fotos (máximo 8)</label>
                            <input type="file" id="fotos" name="fotos[]" multiple
                                accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden"
                                onchange="previewFotos(event)">
                            <div id="preview" class="flex flex-wrap gap-2 mb-2"></div>
                            <input type="hidden" name="foto_principal" id="foto_principal"
                                value="{{ old('foto_principal', 0) }}">
                            <div class="flex gap-2">
                                <button type="button" onclick="document.getElementById('fotos').click()"
                                    class="bg-[#293F5D] hover:bg-blue-800 text-white py-1 px-4 rounded shadow text-sm">Seleccionar
                                    Fotos</button>
                                <button type="button" onclick="cancelarFotos()"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-1 px-4 rounded shadow text-sm">Cancelar</button>
                            </div>
                            <small>Selecciona en el circulo la foto principal</small>
                        </div>

                        <div class="mt-8 flex items-center justify-end gap-3">
                            <button type="button" onclick="closeModal('createModal')"
                                class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400 text-sm font-semibold">Cancelar</button>
                            <button type="submit"
                                class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold">Guardar
                                Casa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Editar Casa --}}
    <div id="editModal" class="fixed inset-0 z-50 hidden" aria-labelledby="edit-modal-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeModal('editModal')"></div>
        <div class="flex min-h-screen items-start justify-center p-4 pt-10 text-center sm:p-0 overflow-y-auto">
            <div
                class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl">
                <div class="bg-white px-6 pb-6 pt-5 max-h-[90vh] overflow-y-auto">
                    <div class="flex items-center justify-between mb-6 border-b pb-4 sticky top-0 bg-white z-10">
                        <h3 class="text-2xl font-bold text-[#404656]" id="edit-modal-title">Editar Casa</h3>
                        <button type="button" onclick="closeModal('editModal')"
                            class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Agente</label>
                                <input type="text" id="edit_agente_text"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 text-gray-500"
                                    readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Propietario</label>
                                <input type="text" id="edit_propietario_text"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 text-gray-500"
                                    readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Código</label>
                                <input type="text" name="codigo" id="edit_codigo"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Título <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="titulo" id="edit_titulo"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                                <select name="estado" id="edit_estado"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                                    <option value="disponible">Disponible</option>
                                    <option value="vendido">Vendido</option>
                                    <option value="alquilado">Alquilado</option>
                                    <option value="entregado">Entregado</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tipo <span
                                        class="text-red-500">*</span></label>
                                <select name="tipo" id="edit_tipo"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                    <option value="venta">Venta</option>
                                    <option value="alquiler">Alquiler</option>
                                    <option value="anticretico">Anticretico</option>
                                    <option value="traspaso">Traspaso</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Zona <span
                                        class="text-red-500">*</span></label>
                                <select name="zona" id="edit_zona"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                    <option value="norte">Norte</option>
                                    <option value="sur">Sur</option>
                                    <option value="este">Este</option>
                                    <option value="oeste">Oeste</option>
                                    <option value="centro">Centro</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Categoría <span
                                        class="text-red-500">*</span></label>
                                <select name="categoria" id="edit_categoria"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                                    <option value="casa">Casa</option>
                                    <option value="departamento">Departamento</option>
                                    <option value="casa_comercial">Casa Comercial</option>
                                    <option value="quinta">Quinta</option>
                                    <option value="terreno">Terreno</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Superficie Terreno (m²) <span
                                        class="text-red-500">*</span></label>
                                <input type="number" step="0.01" name="superficieTerreno" id="edit_superficie_terreno"
                                    min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Superficie Construida (m²) <span
                                        class="text-red-500">*</span></label>
                                <input type="number" step="0.01" name="superficieConstruida" id="edit_superficie_construida"
                                    min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Precio <span
                                        class="text-red-500">*</span></label>
                                <input type="number" step="0.01" name="precio" id="edit_precio" min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Dirección <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="direccion" id="edit_direccion" maxlength="255"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Ciudad <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="ciudad" id="edit_ciudad" maxlength="100"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción <span
                                        class="text-red-500">*</span></label>
                                <textarea name="descripcion" id="edit_descripcion" rows="2"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tiendas <span
                                        class="text-red-500">*</span></label>
                                <input type="number" name="tiendas" id="edit_tiendas" min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Habitaciones <span
                                        class="text-red-500">*</span></label>
                                <input type="number" name="habitaciones" id="edit_habitaciones" min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Baños <span
                                        class="text-red-500">*</span></label>
                                <input type="number" name="banos" id="edit_banos" min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Garajes</label>
                                <input type="number" name="garajes" id="edit_garajes" min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Plantas</label>
                                <input type="number" name="plantas" id="edit_plantas" min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Características Interior
                                    (separadas por coma)</label>
                                <input type="text" name="caracteristicas" id="edit_caracteristicas"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    placeholder="Piscina, Jardín, Seguridad...">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Características Externas
                                    (separadas por coma)</label>
                                <input type="text" name="caracteristicasExternas" id="edit_caracteristicas_externas"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    placeholder="Colegios, Parques, Mercados, Transporte...">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Características Servicios
                                    (separadas por coma)</label>
                                <input type="text" name="caracteristicasServicios" id="edit_caracteristicas_servicios"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    placeholder="Agua, luz, internet, etc...">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Insertar enlace del video de FB
                                    o YT</label>
                                <input type="url" name="videoUrl" id="edit_videourl" maxlength="1000"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129]"
                                    placeholder="https://www.youtube.com/watch?v=...">
                            </div>
                        </div>
                        {{--  por ahora no se mostrara las fotos en el modal de edicion, se podran editar desde la seccion de fotos del detalle de la casa--}}
                      {{--<div class="mt-6">
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
                        </div>--}}

                        <div class="mt-8 flex items-center justify-end gap-3">
                            <button type="button" onclick="closeModal('editModal')"
                                class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400 text-sm font-semibold">Cancelar</button>
                            <button type="submit"
                                class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold">Actualizar
                                Casa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Crear Propietario --}}
    <div id="createPropietarioModal" class="fixed inset-0 z-[60] hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeNestedModal()"></div>
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl">
                <div class="bg-white px-6 pb-6 pt-5">
                    <div class="flex items-center justify-between mb-6 border-b pb-4">
                        <h3 class="text-2xl font-bold text-[#404656]" id="modal-title">Registrar Propietario</h3>
                        <button type="button" onclick="closeNestedModal()"
                            class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    @if ($errors->any() && old('from_casa_modal'))
                        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded text-sm">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="createPropietarioForm" action="{{ route('propietarios.store.ajax') }}" method="POST">
                        @csrf
                        <div id="propietarioErrors" class="mb-3 hidden text-sm text-red-700 bg-red-100 p-2 rounded"></div>
                        <input type="hidden" name="from_casa_modal" value="1">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-2">
                                <label for="create_nombre"
                                    class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                                <input type="text" name="nombre" id="create_nombre" value="{{ old('nombre') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                    placeholder="Nombre" required>
                                @error('nombre')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="create_apellido"
                                    class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                                <input type="text" name="apellido" id="create_apellido" value="{{ old('apellido') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                    placeholder="Apellido" required>
                                @error('apellido')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="create_documento"
                                    class="block text-sm font-medium text-gray-700 mb-1">Documento</label>
                                <input type="number" name="documento" id="create_documento" value="{{ old('documento') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                    placeholder="Número de documento" required>
                                @error('documento')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="create_telefono"
                                    class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                                <input type="text" name="telefono" id="create_telefono" value="{{ old('telefono') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                    placeholder="Teléfono">
                                @error('telefono')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="create_email" class="block text-sm font-medium text-gray-700 mb-1">Correo
                                    Electrónico</label>
                                <input type="email" name="email" id="create_email" value="{{ old('email') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                    placeholder="correo@ejemplo.com">
                                @error('email')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="create_ciudad"
                                    class="block text-sm font-medium text-gray-700 mb-1">Ciudad</label>
                                <input type="text" name="ciudad" id="create_ciudad" value="{{ old('ciudad') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                    placeholder="Ciudad" required>
                                @error('ciudad')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 mt-2">
                            <label for="create_direccion"
                                class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                            <input type="text" name="direccion" id="create_direccion" value="{{ old('direccion') }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                placeholder="Dirección">
                            @error('direccion')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-3 mt-4">
                            <button type="button" onclick="closeNestedModal()"
                                class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400 text-sm font-semibold">Cancelar</button>
                            <button type="submit"
                                class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold">Guardar
                                Propietario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        function isModalOpen(modalId) {
            const modal = document.getElementById(modalId);
            return modal && !modal.classList.contains('hidden');
        }

        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
            }
            if (!isModalOpen('createModal') && !isModalOpen('createPropietarioModal') && !isModalOpen('editModal')) {
                document.body.style.overflow = '';
            }
        }

        function openNestedModal() {
            openModal('createPropietarioModal');
        }

        function closeNestedModal() {
            closeModal('createPropietarioModal');
        }

        function openEditModal(button) {
            const form = document.getElementById('editForm');
            form.action = button.dataset.action;

            document.getElementById('edit_agente_text').value = button.dataset.agenteText || '';
            document.getElementById('edit_propietario_text').value = button.dataset.propietarioText || '';
            document.getElementById('edit_codigo').value = button.dataset.codigo || '';
            document.getElementById('edit_titulo').value = button.dataset.titulo || '';
            document.getElementById('edit_tipo').value = button.dataset.tipo || '';
            document.getElementById('edit_zona').value = button.dataset.zona || '';
            document.getElementById('edit_categoria').value = button.dataset.categoria || '';
            document.getElementById('edit_superficie_terreno').value = button.dataset.superficieTerreno || '';
            document.getElementById('edit_superficie_construida').value = button.dataset.superficieConstruida || '';
            document.getElementById('edit_precio').value = button.dataset.precio || '';
            document.getElementById('edit_direccion').value = button.dataset.direccion || '';
            document.getElementById('edit_ciudad').value = button.dataset.ciudad || '';
            document.getElementById('edit_descripcion').value = button.dataset.descripcion || '';
            document.getElementById('edit_tiendas').value = button.dataset.tiendas || 0;
            document.getElementById('edit_habitaciones').value = button.dataset.habitaciones || 0;
            document.getElementById('edit_banos').value = button.dataset.banos || 0;
            document.getElementById('edit_garajes').value = button.dataset.garajes || 0;
            document.getElementById('edit_plantas').value = button.dataset.plantas || 0;
            document.getElementById('edit_estado').value = button.dataset.estado || 'disponible';
            document.getElementById('edit_caracteristicas').value = button.dataset.caracteristicas || '';
            document.getElementById('edit_caracteristicas_externas').value = button.dataset.caracteristicasExternas || '';
            document.getElementById('edit_caracteristicas_servicios').value = button.dataset.caracteristicasServicios || '';
            document.getElementById('edit_videourl').value = button.dataset.videourl || '';

            openModal('editModal');
        }

        function previewFotos(event) {
            const preview = document.getElementById('preview');
            preview.innerHTML = '';
            const files = event.target.files;
            const tiposPermitidos = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            if (files.length > 8) {
                alert('Solo puedes seleccionar hasta 8 fotos.');
                event.target.value = '';
                return;
            }

            for (const file of files) {
                if (!tiposPermitidos.includes(file.type)) {
                    alert('Solo se permiten fotos JPG, JPEG, PNG o GIF.');
                    event.target.value = '';
                    return;
                }

                if (file.size > 8 * 1024 * 1024) {
                    alert('Cada foto debe pesar como maximo 8MB.');
                    event.target.value = '';
                    return;
                }
            }

            Array.from(files).forEach((file, idx) => {
                const reader = new FileReader();
                reader.onload = e => {
                    const div = document.createElement('div');
                    div.className = 'relative flex flex-col items-center';
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'h-20 w-20 object-cover rounded border mb-1';
                    const radio = document.createElement('input');
                    radio.type = 'radio';
                    radio.name = 'select_principal';
                    radio.value = idx;
                    radio.className = 'mb-1';
                    radio.onclick = function () {
                        document.getElementById('foto_principal').value = idx;
                    };
                    const label = document.createElement('label');
                    label.innerText = ' ';
                    label.className = 'text-xs';
                    div.appendChild(img);
                    div.appendChild(radio);
                    div.appendChild(label);
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
            document.getElementById('foto_principal').value = 0;
        }

        function cancelarFotos() {
            document.getElementById('fotos').value = '';
            document.getElementById('preview').innerHTML = '';
            document.getElementById('foto_principal').value = '';
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                if (isModalOpen('createPropietarioModal')) {
                    closeNestedModal();
                    return;
                }
                if (isModalOpen('editModal')) {
                    closeModal('editModal');
                    return;
                }
                closeModal('createModal');
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            @if($errors->any() && old('from_casa_modal'))
                openModal('createModal');
                openNestedModal();
            @elseif($errors->any())
                openModal('createModal');
            @endif
                    });
        const propietarioForm = document.getElementById('createPropietarioForm');
        const propietarioErrors = document.getElementById('propietarioErrors');

        if (propietarioForm) {
            propietarioForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                propietarioErrors.classList.add('hidden');
                propietarioErrors.innerHTML = '';

                const response = await fetch(propietarioForm.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: new FormData(propietarioForm)
                });

                if (!response.ok) {
                    if (response.status === 422) {
                        const data = await response.json();
                        const errors = Object.values(data.errors || {}).flat();
                        propietarioErrors.innerHTML = errors.map(err => `<div>${err}</div>`).join('');
                        propietarioErrors.classList.remove('hidden');
                    }
                    return;
                }

                const data = await response.json();
                const p = data.propietario;

                const select = document.getElementById('create_propietario_id');
                const label = `${p.nombre} ${p.apellido} - ${p.documento}`;
                const option = new Option(label, p.id, true, true);
                select.add(option);

                propietarioForm.reset();
                closeNestedModal();
                // toastr.success(data.message); // opcional
            });
        }
    </script>
    @if(session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif
    @if(session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif
@endpush