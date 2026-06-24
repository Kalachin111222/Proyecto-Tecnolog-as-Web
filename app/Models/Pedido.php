<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'user_id',
        'codigo_pedido',
        'total',
        'estado',
        'metodo_pago',
        'direccion_envio'
    ];

    // Un pedido pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un pedido tiene muchos detalles
    public function detalles()
    {
        return $this->hasMany(PedidoDetalle::class);
    }
}
