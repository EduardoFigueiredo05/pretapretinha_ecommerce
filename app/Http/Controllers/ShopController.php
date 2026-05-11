<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index()
    {
        // 1. Busca os produtos ativos e já traz a categoria e a imagem principal
        $products = Product::with(['category', 'images' => function($query) {
            $query->where('is_main', true);
        }])->where('is_active', true)->get();

        // 2. Busca as categorias para montarmos o dropdown de filtros na tela
        $categories = Category::all();

        // 3. Envia as DUAS variáveis ($products e $categories) para a View
        return view('loja', compact('products', 'categories'));
    }

    public function show($slug)
    {
        // Busca o produto pelo slug (URL) junto com a categoria e as imagens
        $product = Product::with(['category', 'images'])->where('slug', $slug)->firstOrFail();
        
        return view('produto', compact('product'));
    }
}