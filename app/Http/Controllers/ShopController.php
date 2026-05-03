<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index()
    {
        // Busca todos os produtos ativos, trazendo junto as categorias e as imagens
        $products = Product::with(['category', 'images'])->where('is_active', true)->get();
        
        // Busca as categorias para montarmos o dropdown de filtros na tela
        $categories = Category::all();

        // Envia esses dados para a View chamada 'loja'
        return view('loja', compact('products', 'categories'));
    }
    public function show($slug)
    {
        // Busca o produto pelo slug (URL) junto com a categoria e as imagens
        $product = Product::with(['category', 'images'])->where('slug', $slug)->firstOrFail();
        
        return view('produto', compact('product'));
    }
}
