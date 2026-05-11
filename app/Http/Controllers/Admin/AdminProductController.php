<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    // 1. LISTAR GERAL
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    // 2. CRIAR (Formulário)
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // 3. SALVAR (Banco)
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255|unique:products,title',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'stock' => 'required|integer',
            'weight' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'description' => 'nullable|string',
            'attributes' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        // Cria o Produto
        $product = Product::create($data);

        // Processa as Imagens
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('products', 'public');
                
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_main' => $index === 0 ? true : false,
                ]);
            }
        }

        // Redireciona para o index de produtos (ou dashboard)
        return redirect()->route('admin.products.index')->with('success', 'Produto adicionado com sucesso!');
    }

    // 4. EDITAR (Formulário)
    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $categories = Category::all();
        
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // 5. ATUALIZAR (Banco)
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255|unique:products,title,' . $id,
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'stock' => 'required|integer',
            'weight' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'description' => 'nullable|string',
            'attributes' => 'nullable|string',
        ]);

        if ($product->title !== $request->title) {
            $data['slug'] = Str::slug($request->title);
        }
        
        $data['is_active'] = $request->has('is_active');

        $product->update($data);

        // Lógica de atualização de imagens pode ser adicionada aqui (excluir antigas, subir novas)

        return redirect()->route('admin.products.index')->with('success', 'Produto atualizado!');
    }

    // 6. EXCLUIR
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Exclui as imagens físicas do storage antes de apagar do banco
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produto excluído.');
    }
}