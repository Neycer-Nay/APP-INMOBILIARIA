<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    protected $table = 'propietarios';
    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'telefono',
        'email',
        'direccion',
        'ciudad',
    ];

   

    public function casas()
    {
        return $this->hasMany(Casa::class); // un propietario puede tener muchas casas
    }
}
