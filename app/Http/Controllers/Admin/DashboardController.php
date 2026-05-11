<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // Levanta as métricas da loja
        $totalProducts = Product::count();
        $activeProducts = Product::where('is_active', true)->count();
        $lowStock = Product::where('stock', '<=', 3)->count();
        
        // Pega as 5 últimas bonecas adicionadas
        $recentProducts = Product::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalProducts', 'activeProducts', 'lowStock', 'recentProducts'));
    }
}