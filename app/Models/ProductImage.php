<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{

    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path',
        'is_main'
    ];


    // Relação: Uma Imagem pertence a um Produto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
