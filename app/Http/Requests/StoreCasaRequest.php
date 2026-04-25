<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreCasaRequest extends FormRequest
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

        if ($this->hasFile('fotos') && ! $this->filled('foto_principal')) {
            $this->merge(['foto_principal' => 0]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, string>|string>
     */
    public function rules(): array
    {
        return [
            
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
            'fotos' => ['nullable', 'array', 'max:8'],
            'fotos.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:8048'],
            'foto_principal' => ['nullable', 'integer', 'min:0'],
            'videoUrl' => ['nullable', 'url', 'max:1000'],
            
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            if (! $this->hasFile('fotos')) {
                return;
            }

            $totalFotos = count($this->file('fotos'));
            $indicePrincipal = (int) $this->input('foto_principal', 0);

            if ($indicePrincipal < 0 || $indicePrincipal >= $totalFotos) {
                $validator->errors()->add('foto_principal', 'La foto principal seleccionada no es valida.');
            }
        });
    }

    public function attributes(): array
    {
        return [
            'videoUrl' => 'video',
            'superficieTerreno' => 'superficie de terreno',
            'superficieConstruida' => 'superficie construida',
            'caracteristicasExternas' => 'caracteristicas externas',
            'caracteristicasServicios' => 'caracteristicas de servicios',
            
            'foto_principal' => 'foto principal',
        ];
    }
}
