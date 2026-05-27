<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre', 'categoria', 'precio', 'imagen', 'descripcion', 'slug', 'stock'];

    public function carritoItems()
    {
        return $this->hasMany(CarritoItem::class);
    }
}
