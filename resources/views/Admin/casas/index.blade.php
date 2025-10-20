@extends('layouts.main')

@section('contenido')
<form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="text-red-500 hover:underline bg-transparent border-0 p-0">
            Cerrar sesión
        </button>
    </form>
    <div class="max-w-7xl mx-auto py-8 px-2">
        <h2 class="text-2xl font-bold text-[#404656] mb-6 text-center">Listado de Casas</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead>
                    <tr class="bg-[#404656] text-white">
                        <th class="py-3 px-4 text-left">Foto</th>
                        <th class="py-3 px-4 text-left">Categoría</th>
                        <th class="py-3 px-4 text-left">Tipo</th>
                        <th class="py-3 px-4 text-left">Zona</th>
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
                            <td class="py-2 px-4">

                                @if($casa->fotos && $casa->fotos->first())
                                    <img src="{{ asset('storage/' . ltrim($casa->fotos->first()->ruta_imagen, '/')) }}"
                                        alt="Foto casa" class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-400">Sin imagen</span>
                                @endif

                            </td>
                            <td class="py-2 px-4">{{ mb_strtoupper(str_replace('_', ' ', $casa->categoria)) }}</td>
                            <td class="py-2 px-4">{{ mb_strtoupper($casa->tipo) }}</td>
                            <td class="py-2 px-4">{{ mb_strtoupper($casa->zona) }}</td>
                            <td class="py-2 px-4">{{ mb_strtoupper($casa->direccion) }}</td>
                            <td class="py-2 px-4">{{ $casa->codigo }}</td>
                            <td class="py-2 px-4">
                                {{ number_format($casa->precio, 0, ',', '.') }}
                                {{ $casa->tipo == 'alquiler' ? 'Bs' : '$us' }}
                            </td>
                            
                            <td class="py-2 px-4">{{ $casa->estado }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('casas.show', $casa->id) }}"
                                    class="bg-[#404656] text-white py-1 px-3 rounded hover:bg-[#2c3240] text-sm" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('casas.edit', $casa->id) }}"
                                    class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 text-sm"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('casas.destroy', $casa->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 text-sm" title="Eliminar"
                                        title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar esta casa?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
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
    
@endsection
@push('scripts')
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
