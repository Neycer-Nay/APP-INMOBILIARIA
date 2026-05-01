@extends('Admin.layouts.main')

@section('contenido')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-[#e09129] px-6 py-4">
            <h2 class="text-xl font-bold text-white menu-font">Editar perfil</h2>
            
        </div>

        <!-- Form -->
        <div class="p-6">
            <form action="{{ route('agente.perfil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Foto actual -->
                <div class="flex flex-col items-center mb-6">
                    <div class="relative">
                        @if($agente->foto)
                            <img src="{{ asset('storage/' . $agente->foto) }}" alt="Foto de perfil" 
                                class="w-32 h-32 rounded-full object-cover border-4 border-[#e09129]">
                        @else
                            <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center border-4 border-[#e09129]">
                                <i class="fas fa-user text-4xl text-gray-400"></i>
                            </div>
                        @endif
                    </div>
                    <p class="text-sm text-gray-500 mt-2 menu-font">Tu foto de perfil</p>
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="telefono" class="block text-sm font-semibold text-gray-700 mb-2 menu-font">
                        <i class="fas fa-phone mr-2 text-[#e09129]"></i>Teléfono
                    </label>
                    <input type="number" name="telefono" id="telefono" 
                        value="{{ old('telefono', $agente->telefono) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent menu-font"
                        placeholder="Ej. 70000000">
                    @error('telefono')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Comisión -->
                <div>
                    <label for="comision_predeterminada" class="block text-sm font-semibold text-gray-700 mb-2 menu-font">
                        <i class="fas fa-percent mr-2 text-[#e09129]"></i>Comisión predeterminada (%)
                    </label>
                    <input type="number" name="comision_predeterminada" id="comision_predeterminada" 
                        value="{{ old('comision_predeterminada', $agente->comision_predeterminada) }}"
                        min="0" max="100" step="0.01"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent menu-font"
                        placeholder="Porcentaje de comisión">
                    @error('comision_predeterminada')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Foto -->
                <div>
                    <label for="foto" class="block text-sm font-semibold text-gray-700 mb-2 menu-font">
                        <i class="fas fa-camera mr-2 text-[#e09129]"></i>Cambiar foto
                    </label>
                    <input type="file" name="foto" id="foto" accept="image/jpeg,image/png,image/jpg,image/gif"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#e09129] focus:border-transparent menu-font"
                        onchange="previewImage(event)">
                    <p class="text-xs text-gray-500 mt-1">Formats: JPEG, PNG, JPG, GIF. Máximo 2MB.</p>
                    @error('foto')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Vista previa -->
                <div id="preview-container" class="hidden">
                    <p class="text-sm font-semibold text-gray-700 mb-2 menu-font">Vista previa:</p>
                    <img id="foto-preview" src="" alt="Vista previa" class="w-32 h-32 rounded-full object-cover border-4 border-[#e09129]">
                </div>

                <!-- Botones -->
                <div class="flex items-center justify-end gap-3 pt-4">
                    <a href="{{ route('dashboard') }}" 
                        class="bg-gray-300 text-gray-700 py-3 px-6 rounded-lg hover:bg-gray-400 transition-colors menu-font font-semibold">
                        <i class="fas fa-times mr-2"></i>Cancelar
                    </a>
                    <button type="submit" 
                        class="bg-[#e09129] text-white py-3 px-6 rounded-lg hover:bg-[#c57d1f] transition-colors menu-font font-semibold">
                        <i class="fas fa-save mr-2"></i>Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('foto-preview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('hidden');
        }
    }
</script>

<style>
    .menu-font { font-family: 'Muli', sans-serif; }
</style>
@endsection
