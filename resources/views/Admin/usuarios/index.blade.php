@extends('Admin.layouts.main')

@section('contenido')
    <div class="max-w-7xl mx-auto py-2 px-2">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-[#404656]">Listado de Usuarios</h2>
            <a href="{{ route('usuarios.create') }}"
               class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold">
                <i class="fas fa-plus mr-1"></i> Nuevo Usuario
            </a>
        </div>

        <div class="overflow-x-auto rounded-2xl">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead>
                    <tr class="bg-[#404656] text-white">
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Correo Electrónico</th>
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
                                <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                   class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 text-sm"
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('usuarios.toggleStatus', $usuario->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    @if($usuario->active)
                                        <button type="submit"
                                                class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 text-sm"
                                                title="Desactivar"
                                                onclick="return confirm('¿Estás seguro de desactivar este usuario?')">
                                            <i class="fas fa-user-times"></i>
                                        </button>
                                    @else
                                        <button type="submit"
                                                class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600 text-sm"
                                                title="Activar"
                                                onclick="return confirm('¿Estás seguro de activar este usuario?')">
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
@endsection

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
