<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoCasa extends Model
{
    protected $fillable = [
        'casa_id',
        'ruta_imagen',
        'foto_principal',
    ];

    public function casa()
    {
        return $this->belongsTo(Casa::class);
    }
}
