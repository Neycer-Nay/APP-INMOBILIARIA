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
        'caracteristicasServicios'
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
