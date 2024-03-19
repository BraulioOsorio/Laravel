<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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

    public function cupon() :BelongsTo{
        return $this->belongsTo(Cupon::class);
    }

    public function plato() :BelongsTo{
        return $this->belongsTo(Plato::class);
    }
}

