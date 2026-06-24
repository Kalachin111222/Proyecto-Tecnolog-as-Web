<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    protected $fillable = [
        'pedido_id',
        'producto_id', 
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    // Un detalle pertenece a un pedido
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    // Un detalle referencia a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
