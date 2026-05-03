<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'title', 'slug', 'price', 
        'discount_price', 'description', 'attributes', 'stock', 'is_active'
    ];

    // Relação: Um Produto pertence a uma Categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relação: Um Produto tem muitas Imagens
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
