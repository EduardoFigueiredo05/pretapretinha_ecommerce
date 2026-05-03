<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    // Relação: Uma Imagem pertence a um Produto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
