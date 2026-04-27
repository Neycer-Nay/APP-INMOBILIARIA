@extends('Admin.layouts.main')

@section('contenido')
    <div class="max-w-7xl mx-auto py-2 px-2">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-[#404656]">Listado de Usuarios</h2>
            <button type="button" onclick="openModal('createModal')"
               class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold">
                <i class="fas fa-plus mr-1"></i> Nuevo Usuario
            </button>
        </div>

        <div class="overflow-x-auto rounded-2xl">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead>
                    <tr class="bg-[#404656] text-white">
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Correo </th>
                        <th class="py-3 px-4 text-left">Rol</th>
                        <th class="py-3 px-4 text-left">Estado</th>
                        <th class="py-3 px-4 text-left">Registrado</th>
                        <th class="py-3 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $usuario->id }}</td>
                            <td class="py-2 px-4">{{ $usuario->name }}</td>
                            <td class="py-2 px-4">{{ $usuario->email }}</td>
                            <td class="py-2 px-4">{{ $usuario->rol ? $usuario->rol->nombre : 'Sin rol' }}</td>
                            <td class="py-2 px-4">
                                @if($usuario->active)
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded">Activo</span>
                                @else
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded">Inactivo</span>
                                @endif
                            </td>
                            <td class="py-2 px-4">{{ $usuario->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-4">
                                <button type="button"
                                   class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 text-sm"
                                   title="Editar"
                                   onclick="openEditModal(this)"
                                   data-action="{{ route('usuarios.update', $usuario->id) }}"
                                   data-user-id="{{ $usuario->id }}"
                                   data-name="{{ $usuario->name }}"
                                   data-email="{{ $usuario->email }}"
                                   data-role-id="{{ $usuario->role_id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('usuarios.userEstado', $usuario->id) }}" method="POST" class="form-estado" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    @if($usuario->active)
                                        <button type="submit"
                                                class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 text-sm"
                                                title="Desactivar">
                                                 <i class="fas fa-user-times"></i>
                                        </button>
                                    @else
                                        <button type="submit"
                                                class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600 text-sm"
                                                title="Activar">                                                    
                                            <i class="fas fa-user-check"></i>
                                        </button>
                                    @endif
                                </form>
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
            {{ $usuarios->links('pagination::tailwind') }}
        </div>
    </div>

    {{-- Modal Crear Usuario --}}
    <div id="createModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeModal('createModal')"></div>
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl">
                <div class="bg-white px-6 pb-6 pt-5">
                    <div class="flex items-center justify-between mb-6 border-b pb-4">
                        <h3 class="text-2xl font-bold text-[#404656]" id="modal-title">Registrar Usuario</h3>
                        <button type="button" onclick="closeModal('createModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="create_name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" name="name" id="create_name" value="{{ old('name') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="Nombre completo" required>
                            @error('name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="create_email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                            <input type="email" name="email" id="create_email" value="{{ old('email') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="correo@ejemplo.com" required>
                            @error('email')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="create_password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                            <input type="password" name="password" id="create_password"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="Mínimo 8 caracteres" required>
                            @error('password')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="create_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="create_password_confirmation"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="Repite la contraseña" required>
                        </div>

                        <div class="mb-6">
                            <label for="create_role_id" class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
                            <select name="role_id" id="create_role_id"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                    required>
                                <option value="">Seleccione un rol</option>
                                @foreach(App\Models\Rol::all() as $rol)
                                    <option value="{{ $rol->id }}" {{ old('role_id') == $rol->id ? 'selected' : '' }}>
                                        {{ $rol->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-3">
                            <button type="button" onclick="closeModal('createModal')"
                                   class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400 text-sm font-semibold">
                                Cancelar
                            </button>
                            <button type="submit"
                                    class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold">
                                Guardar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Editar Usuario --}}
    <div id="editModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeModal('editModal')"></div>
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl">
                <div class="bg-white px-6 pb-6 pt-5">
                    <div class="flex items-center justify-between mb-6 border-b pb-4">
                        <h3 class="text-2xl font-bold text-[#404656]" id="modal-title">Editar Usuario</h3>
                        <button type="button" onclick="closeModal('editModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" id="edit_user_id" value="{{ old('user_id') }}">

                        <div class="mb-4">
                            <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" name="name" id="edit_name" value="{{ old('name') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="Nombre completo" required>
                            @error('name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="edit_email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                            <input type="email" name="email" id="edit_email" value="{{ old('email') }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="correo@ejemplo.com" required>
                            @error('email')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="edit_password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                            <input type="password" name="password" id="edit_password"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="Dejar en blanco para mantener la actual">
                            @error('password')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="edit_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="edit_password_confirmation"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                   placeholder="Repite la contraseña">
                        </div>

                        <div class="mb-6">
                            <label for="edit_role_id" class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
                            <select name="role_id" id="edit_role_id"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                                    required>
                                <option value="">Seleccione un rol</option>
                                @foreach(App\Models\Rol::all() as $rol)
                                    <option value="{{ $rol->id }}" {{ old('role_id') == $rol->id ? 'selected' : '' }}>
                                        {{ $rol->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-3">
                            <button type="button" onclick="closeModal('editModal')"
                                   class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400 text-sm font-semibold">
                                Cancelar
                            </button>
                            <button type="submit"
                                    class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold">
                                Actualizar Usuario
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
        const userId = button.getAttribute('data-user-id');
        const name = button.getAttribute('data-name');
        const email = button.getAttribute('data-email');
        const roleId = button.getAttribute('data-role-id');

        document.getElementById('editForm').action = action;
        document.getElementById('edit_user_id').value = userId;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_password').value = '';
        document.getElementById('edit_password_confirmation').value = '';

        const roleSelect = document.getElementById('edit_role_id');
        roleSelect.value = roleId || '';

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
        @if(old('_method') == 'PUT' && old('user_id'))
            // Error en edición: reabrir modal de editar con valores old()
            document.getElementById('editForm').action = "{{ route('usuarios.update', old('user_id')) }}";
            openModal('editModal');
        @elseif($errors->any())
            // Error en creación: reabrir modal de crear
            openModal('createModal');
        @endif
    });

    document.querySelectorAll('.form-estado').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Evita el envío automático

            // Determina el estado actual (activo o inactivo) para el mensaje
            const button = this.querySelector('button[type="submit"]');
            const isActive = button.classList.contains('bg-red-500'); // Ajusta según tu lógica
            const title = isActive ? '¿Desactivar usuario?' : '¿Activar usuario?';
            const text = isActive ? 'El usuario quedará inhabilitado para acceder al sistema.' : 'El usuario podrá acceder nuevamente al sistema.';
            const confirmButtonText = isActive ? 'Sí, desactivar' : 'Sí, activar';

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: confirmButtonText,
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Envía el formulario manualmente
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
