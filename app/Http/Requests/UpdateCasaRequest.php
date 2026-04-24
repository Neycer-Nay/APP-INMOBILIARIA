<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCasaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if (! $this->filled('estado')) {
            $this->merge(['estado' => 'disponible']);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, string|Rule>|string>
     */
    public function rules(): array
    {
        $id = (int) $this->route('id');

        return [
            'codigo' => ['required', 'string', 'max:255', Rule::unique('casas', 'codigo')->ignore($id)],
            'titulo' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'in:venta,alquiler,anticretico,traspaso'],
            'zona' => ['required', 'in:norte,sur,este,oeste,centro'],
            'categoria' => ['required', 'in:casa,departamento,casa_comercial,quinta,terreno'],
            'superficieTerreno' => ['required', 'numeric', 'min:0'],
            'superficieConstruida' => ['required', 'numeric', 'min:0'],
            'precio' => ['required', 'numeric', 'min:0'],
            'direccion' => ['required', 'string', 'max:255'],
            'ciudad' => ['required', 'string', 'max:100'],
            'descripcion' => ['required', 'string'],
            'tiendas' => ['required', 'integer', 'min:0'],
            'habitaciones' => ['required', 'integer', 'min:0'],
            'banos' => ['required', 'integer', 'min:0'],
            'garajes' => ['nullable', 'integer', 'min:0'],
            'plantas' => ['nullable', 'integer', 'min:1'],
            'estado' => ['nullable', 'in:disponible,vendido,alquilado,entregado'],
            'caracteristicas' => ['nullable', 'string'],
            'caracteristicasExternas' => ['nullable', 'string'],
            'caracteristicasServicios' => ['nullable', 'string'],
            'videoUrl' => ['nullable', 'url', 'max:1000'],
            'plano_distribucion' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
        ];
    }

    public function attributes(): array
    {
        return [
            'videoUrl' => 'video',
            'superficieTerreno' => 'superficie de terreno',
            'superficieConstruida' => 'superficie construida',
            'caracteristicasExternas' => 'caracteristicas externas',
            'caracteristicasServicios' => 'caracteristicas de servicios',
            'plano_distribucion' => 'plano de distribucion',
        ];
    }
}
