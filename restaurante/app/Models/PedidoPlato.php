<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PedidoPlato extends Model
{
    use HasFactory;
    protected $fillable = [
        'plato_id',
        'pedido_id',

    ];

    public function plato() :BelongsTo{
        return $this->belongsTo(Plato::class);
    }

    public function pedido() :BelongsTo{
        return $this->belongsTo(Domicilio::class);
    }

}
