<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    protected $fillable = [
        'codigo',
        'titulo',
        'tipo',
        'zona',
        'categoria',
        'superficieTerreno',
        'superficieConstruida',
        'precioAnterior',
        'precio',
        'direccion',
        'ciudad',
        'descripcion',
        'tiendas',
        'habitaciones',
        'banos',
        'garajes',
        'plantas',
        'estado',
        'caracteristicas',
        'caracteristicasExternas',
        'caracteristicasServicios',
        'videoUrl',
        'plano_distribucion',
    ];

    protected $casts = [
        'caracteristicas' => 'array',
        'caracteristicasExternas' => 'array',
        'caracteristicasServicios' => 'array',
    ];

    public function fotos()
    {
        return $this->hasMany(FotoCasa::class, 'casa_id');
    }
}
