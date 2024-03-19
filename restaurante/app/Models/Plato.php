<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'categoria_id',
        'precio',
        'costo',
        'status',
        
    ];
    
    public function categoria() :BelongsTo{
        return $this->belongsTo(Categoria::class);
    }

    public function domicilio() : HasMany {
        return $this->hasMany(Domicilio::class);
    }
}
