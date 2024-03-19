<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Cupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_cupon',
        'porcentaje',
        'status',
    ];

    public function domicilio() : HasMany {
        return $this->hasMany(Domicilio::class);
    }

}
