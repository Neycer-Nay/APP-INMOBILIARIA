<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    protected $fillable = [
        'codigo',
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
        'caracteristicasExternas'
    ];

    protected $casts = [
        'caracteristicas' => 'array',
        'caracteristicasExternas' => 'array',
    ];

    public function fotos()
    {
        return $this->hasMany(FotoCasa::class, 'casa_id');
    }
}
