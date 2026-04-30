<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_ventas';
    protected $fillable = [
        'venta_id',
        'propietario_id',
        'agente_id',
        'monto_comision',
        'porcentaje_comision',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }
}
