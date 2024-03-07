<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $fillable = [
        'codigo_cupon',
        'porcentaje',
        'status',
    ];
}
