<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'plato_id',
        'precio',
        'tipo_pedido',
        'cupon_id',
        'descripcion',
        'hora',
        'direccion',
        'status',

    ];
}

