@extends('Admin.layouts.main')

@section('contenido')
    <div class="max-w-7xl mx-auto py-2 px-2">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-[#404656]">Listado de Agentes</h2>

        </div>

        <div class="overflow-x-auto rounded-2xl">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead>
                    <tr class="bg-[#404656] text-white">

                        <th class="py-3 px-4 text-left uppercase">Nombre</th>
                        <th class="py-3 px-4 text-left uppercase">Correo </th>
                        <th class="py-3 px-4 text-left uppercase">Foto</th>
                        <th class="py-3 px-4 text-left uppercase">Estado</th>
                        <th class="py-3 px-4 text-left uppercase">Registrado</th>
                        <th class="py-3 px-4 text-left uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agentes as $agente)
                        <tr class="border-b">

                            <td class="py-2 px-4">{{ $agente->user->name }}</td>
                            <td class="py-2 px-4">{{ $agente->user->email }}</td>
                            <td class="py-2 px-4">
                                @if($agente->foto)
                                    <img src="{{ asset('storage/' . $agente->foto) }}" alt="Foto de {{ $agente->user->name }}" class="h-12 w-12 rounded-full object-cover border">
                                @else
                                    <span class="text-sm text-gray-400">Sin foto</span>
                                @endif
                            </td>
                            <td class="py-2 px-4">
                                @if($agente->user->active)
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded">Activo</span>
                                @else
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded">Inactivo</span>
                                @endif
                            </td>
                            <td class="py-2 px-4">{{ $agente->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-4">
                                <button type="button"
                                    class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 text-sm"
                                    title="Editar" onclick="openEditModal(this)"
                                    data-action="{{ route('agentes.update', $agente->id) }}"
                                    data-agente-id="{{ $agente->id }}"
                                    data-telefono="{{ $agente->telefono }}"
                                    data-comision="{{ $agente->comision_predeterminada }}"
                                    data-foto-url="{{ $agente->foto ? asset('storage/' . $agente->foto) : '' }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-6">
                                No hay usuarios registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $agentes->links('pagination::tailwind') }}
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeModal('editModal')"></div>
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl">
                <div class="bg-white px-6 pb-6 pt-5">
                    <div class="flex items-center justify-between mb-6 border-b pb-4">
                        <h3 class="text-2xl font-bold text-[#404656]" id="modal-title">Editar Agente</h3>
                        <button type="button" onclick="closeModal('editModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="agente_id" id="edit_agente_id" value="{{ old('agente_id') }}">

                        <div class="mb-4">
                            <label for="edit_telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                            <input type="text" name="telefono" id="edit_telefono" value="{{ old('telefono') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="Ej. 70000000">
                            @error('telefono')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="edit_comision_predeterminada" class="block text-sm font-medium text-gray-700 mb-1">Comisión predeterminada</label>
                            <input type="number" name="comision_predeterminada" id="edit_comision_predeterminada" value="{{ old('comision_predeterminada') }}"
                                   min="0" max="100" step="0.01"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="Porcentaje de comisión">
                            @error('comision_predeterminada')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="edit_foto" class="block text-sm font-medium text-gray-700 mb-1">Foto <span class="text-red-500">*</span></label>
                            <input type="file" name="foto" id="edit_foto" accept="image/jpeg,image/png,image/jpg,image/gif"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   required>
                            <p class="mt-1 text-xs text-gray-500">La foto es obligatoria para guardar los cambios.</p>
                            @error('foto')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <div class="mb-2 text-sm font-medium text-gray-700">Vista previa actual</div>
                            <img id="edit_foto_preview" src="" alt="Vista previa de foto" class="hidden h-28 w-28 rounded-xl object-cover border">
                            <div id="edit_foto_placeholder" class="text-sm text-gray-400">Sin foto seleccionada</div>
                        </div>

                        <div class="flex items-center justify-end gap-3">
                            <button type="button" onclick="closeModal('editModal')"
                                   class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400 text-sm font-semibold">
                                Cancelar
                            </button>
                            <button type="submit"
                                    class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold">
                                Actualizar Agente
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.body.style.overflow = '';
    }

    function setFotoPreview(src) {
        const preview = document.getElementById('edit_foto_preview');
        const placeholder = document.getElementById('edit_foto_placeholder');

        if (src) {
            preview.src = src;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
        } else {
            preview.removeAttribute('src');
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
        }
    }

    function openEditModal(button) {
        const action = button.getAttribute('data-action');
        const agenteId = button.getAttribute('data-agente-id');
        const telefono = button.getAttribute('data-telefono') || '';
        const comision = button.getAttribute('data-comision') || '';
        const fotoUrl = button.getAttribute('data-foto-url') || '';

        document.getElementById('editForm').action = action;
        document.getElementById('edit_agente_id').value = agenteId;
        document.getElementById('edit_telefono').value = telefono;
        document.getElementById('edit_comision_predeterminada').value = comision;
        document.getElementById('edit_foto').value = '';
        setFotoPreview(fotoUrl);

        openModal('editModal');
    }

    document.getElementById('edit_foto').addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (!file) {
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            setFotoPreview(e.target.result);
        };
        reader.readAsDataURL(file);
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal('editModal');
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        @if(old('agente_id'))
            document.getElementById('editForm').action = "{{ route('agentes.update', old('agente_id')) }}";
            setFotoPreview('');
            openModal('editModal');
        @endif
    });
</script>
@endpush