<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // 1. Exibe a página do carrinho
    public function index()
    {
        // Puxa o carrinho da sessão. Se não existir, retorna um array vazio []
        $cart = session()->get('cart', []);
        
        return view('carrinho', compact('cart'));
    }

    // 2. Adiciona um produto ao carrinho
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        // Define o preço real (Verifica se tem preço com desconto)
        $price = $product->discount_price ?? $product->price;

        // Pega a imagem de capa para mostrar no carrinho
        $mainImage = $product->images->where('is_main', true)->first() ?? $product->images->first();
        $imagePath = $mainImage ? asset('storage/' . $mainImage->image_path) : 'https://placehold.co/100x100?text=Sem+Foto';

        // Se o produto já estiver no carrinho, apenas soma a quantidade
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            // Se não estiver, cria o item no carrinho
            $cart[$product->id] = [
                "id" => $product->id,
                "title" => $product->title,
                "quantity" => $request->quantity,
                "price" => $price,
                "image" => $imagePath
            ];
        }

        // Salva de volta na sessão
        session()->put('cart', $cart);

        return redirect()->route('carrinho.index')->with('success', 'Produto adicionado à sua sacola!');
    }

    // 3. Remove um produto do carrinho
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            
            return redirect()->route('carrinho.index')->with('success', 'Produto removido da sacola!');
        }
    }

    // 4. Exibe a tela de Checkout
    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        // Proteção: Se a sacola estiver vazia, manda o cliente de volta pra loja
        if(count($cart) == 0) {
            return redirect()->route('loja')->with('error', 'Sua sacola está vazia.');
        }

        return view('checkout', compact('cart'));
    }

    }