@extends('Admin.layouts.main')

@section('contenido')
    <div class="max-w-7xl mx-auto py-2 px-2">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-[#404656] ">Listado de Propietarios</h2>
            <button type="button" onclick="openModal('createModal')"
               class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold uppercase">
                <i class="fas fa-plus mr-1"></i> Nuevo Propietario
            </button>
        </div>

        <div class="overflow-x-auto rounded-2xl">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead>
                    <tr class="bg-[#404656] text-white">
                        
                        <th class="py-3 px-4 text-left uppercase">Nombre Completo</th>
                        <th class="py-3 px-4 text-left uppercase">Documento</th>
                        <th class="py-3 px-4 text-left uppercase">Teléfono</th>
                        <th class="py-3 px-4 text-left uppercase">Correo</th>
                        <th class="py-3 px-4 text-left uppercase">Ciudad</th>
                        <th class="py-3 px-4 text-left uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($propietarios as $propietario)
                        <tr class="border-b">
                            
                            <td class="py-2 px-4">{{ $propietario->nombre }} {{ $propietario->apellido }}</td>
                            <td class="py-2 px-4">{{ $propietario->documento }}</td>
                            <td class="py-2 px-4">{{ $propietario->telefono ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $propietario->email ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $propietario->ciudad }}</td>
                            <td class="py-2 px-4">
                                <button type="button"
                                   class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 text-sm"
                                   title="Editar"
                                   onclick="openEditModal(this)"
                                   data-action="{{ route('propietarios.update', $propietario) }}"
                                   data-id="{{ $propietario->id }}"
                                   data-nombre="{{ $propietario->nombre }}"
                                   data-apellido="{{ $propietario->apellido }}"
                                   data-documento="{{ $propietario->documento }}"
                                   data-telefono="{{ $propietario->telefono }}"
                                   data-email="{{ $propietario->email }}"
                                   data-direccion="{{ $propietario->direccion }}"
                                   data-ciudad="{{ $propietario->ciudad }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-6">
                                No hay propietarios registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $propietarios->links('pagination::tailwind') }}
        </div>
    </div>

    {{-- Modal Crear Propietario --}}
    <div id="createModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeModal('createModal')"></div>
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl">
                <div class="bg-white px-6 pb-6 pt-5">
                    <div class="flex items-center justify-between mb-6 border-b pb-4">
                        <h3 class="text-2xl font-bold text-[#404656]" id="modal-title">Registrar Propietario</h3>
                        <button type="button" onclick="closeModal('createModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    <form action="{{ route('propietarios.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-2">
                                <label for="create_nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                                <input type="text" name="nombre" id="create_nombre" value="{{ old('nombre') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="Nombre" required>
                                @error('nombre')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="create_apellido" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                                <input type="text" name="apellido" id="create_apellido" value="{{ old('apellido') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="Apellido" required>
                                @error('apellido')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="create_documento" class="block text-sm font-medium text-gray-700 mb-1">Documento</label>
                                <input type="number" name="documento" id="create_documento" value="{{ old('documento') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="Número de documento" required>
                                @error('documento')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="create_telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                                <input type="text" name="telefono" id="create_telefono" value="{{ old('telefono') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="Teléfono">
                                @error('telefono')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="create_email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                                <input type="email" name="email" id="create_email" value="{{ old('email') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="correo@ejemplo.com">
                                @error('email')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="create_ciudad" class="block text-sm font-medium text-gray-700 mb-1">Ciudad</label>
                                <input type="text" name="ciudad" id="create_ciudad" value="{{ old('ciudad') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="Ciudad" required>
                                @error('ciudad')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 mt-2">
                            <label for="create_direccion" class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                            <input type="text" name="direccion" id="create_direccion" value="{{ old('direccion') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="Dirección">
                            @error('direccion')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-3 mt-4">
                            <button type="button" onclick="closeModal('createModal')"
                                   class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400 text-sm font-semibold">
                                Cancelar
                            </button>
                            <button type="submit"
                                    class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold">
                                Guardar Propietario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Editar Propietario --}}
    <div id="editModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeModal('editModal')"></div>
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl">
                <div class="bg-white px-6 pb-6 pt-5">
                    <div class="flex items-center justify-between mb-6 border-b pb-4">
                        <h3 class="text-2xl font-bold text-[#404656]" id="modal-title">Editar Propietario</h3>
                        <button type="button" onclick="closeModal('editModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="propietario_id" id="edit_propietario_id" value="{{ old('propietario_id') }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-2">
                                <label for="edit_nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                                <input type="text" name="nombre" id="edit_nombre" value="{{ old('nombre') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="Nombre" required>
                                @error('nombre')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="edit_apellido" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                                <input type="text" name="apellido" id="edit_apellido" value="{{ old('apellido') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="Apellido" required>
                                @error('apellido')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="edit_documento" class="block text-sm font-medium text-gray-700 mb-1">Documento</label>
                                <input type="number" name="documento" id="edit_documento" value="{{ old('documento') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="Número de documento" required>
                                @error('documento')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="edit_telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                                <input type="text" name="telefono" id="edit_telefono" value="{{ old('telefono') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="Teléfono">
                                @error('telefono')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="edit_email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                                <input type="email" name="email" id="edit_email" value="{{ old('email') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="correo@ejemplo.com">
                                @error('email')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="edit_ciudad" class="block text-sm font-medium text-gray-700 mb-1">Ciudad</label>
                                <input type="text" name="ciudad" id="edit_ciudad" value="{{ old('ciudad') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                       placeholder="Ciudad" required>
                                @error('ciudad')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 mt-2">
                            <label for="edit_direccion" class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                            <input type="text" name="direccion" id="edit_direccion" value="{{ old('direccion') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="Dirección">
                            @error('direccion')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-3 mt-4">
                            <button type="button" onclick="closeModal('editModal')"
                                   class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400 text-sm font-semibold">
                                Cancelar
                            </button>
                            <button type="submit"
                                    class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold">
                                Actualizar Propietario
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

    function openEditModal(button) {
        const action = button.getAttribute('data-action');
        const id = button.getAttribute('data-id');
        const nombre = button.getAttribute('data-nombre');
        const apellido = button.getAttribute('data-apellido');
        const documento = button.getAttribute('data-documento');
        const telefono = button.getAttribute('data-telefono');
        const email = button.getAttribute('data-email');
        const direccion = button.getAttribute('data-direccion');
        const ciudad = button.getAttribute('data-ciudad');

        document.getElementById('editForm').action = action;
        document.getElementById('edit_propietario_id').value = id;
        document.getElementById('edit_nombre').value = nombre;
        document.getElementById('edit_apellido').value = apellido;
        document.getElementById('edit_documento').value = documento;
        document.getElementById('edit_telefono').value = telefono || '';
        document.getElementById('edit_email').value = email || '';
        document.getElementById('edit_direccion').value = direccion || '';
        document.getElementById('edit_ciudad').value = ciudad;

        openModal('editModal');
    }

    // Cerrar modales con tecla ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal('createModal');
            closeModal('editModal');
        }
    });

    // Reabrir modal si hay errores de validación
    document.addEventListener('DOMContentLoaded', function() {
        @if(old('_method') == 'PUT' && old('propietario_id'))
            document.getElementById('editForm').action = "{{ route('propietarios.update', old('propietario_id')) }}";
            openModal('editModal');
        @elseif($errors->any())
            openModal('createModal');
        @endif
    });

    document.querySelectorAll('.form-eliminar').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Eliminar propietario?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@endpush

@push('scripts')
    @if(session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif
    @if(session('warning'))
        <script>
            toastr.warning("{{ session('warning') }}");
        </script>
    @endif
    @if(session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif
@endpush

