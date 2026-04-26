@extends('Admin.layouts.main')

@section('contenido')
    <div class="max-w-3xl mx-auto py-6 px-4">
        <h2 class="text-2xl font-bold text-[#404656] mb-6 text-center">Editar Usuario</h2>

        <form action="{{ route('usuarios.update', $user->id) }}" method="POST" class="bg-white rounded-xl shadow p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                       placeholder="Nombre completo" required>
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                       placeholder="correo@ejemplo.com" required>
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <input type="password" name="password" id="password"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                       placeholder="Dejar en blanco para mantener la actual">
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                       placeholder="Repite la contraseña">
            </div>

            <div class="mb-6">
                <label for="role_id" class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
                <select name="role_id" id="role_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent"
                        required>
                    <option value="">Seleccione un rol</option>
                    @foreach(App\Models\Rol::all() as $rol)
                        <option value="{{ $rol->id }}" {{ old('role_id', $user->role_id) == $rol->id ? 'selected' : '' }}>
                            {{ $rol->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3">
                <a href="{{ route('usuarios.index') }}"
                   class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400 text-sm font-semibold">
                    Cancelar
                </a>
                <button type="submit"
                        class="bg-[#e09129] text-white py-2 px-4 rounded hover:bg-[#c57d1f] text-sm font-semibold">
                    Actualizar Usuario
                </button>
            </div>
        </form>
    </div>
@endsection
