<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
protected $fillable = [
        'casa_id',
        'propietario_id',
        'cliente_id',
        'agente_id',
        'fecha_venta',
        'precio_venta',
    ];

    public function casa()
    {
        return $this->belongsTo(Casa::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function agente()
    {
        return $this->belongsTo(Agente::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
