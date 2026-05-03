<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Criar Categorias
        $catAbayomi = Category::create([
            'name' => 'Coleção Abayomi',
            'slug' => 'colecao-abayomi',
            'macro_theme' => 'Étnico-Racial'
        ]);

        $catInclusao = Category::create([
            'name' => 'Coleção Inclusão & Deficiência',
            'slug' => 'colecao-inclusao',
            'macro_theme' => 'Inclusão & Deficiência'
        ]);

        // 2. Criar Produtos
        $prod1 = Product::create([
            'category_id' => $catAbayomi->id,
            'title' => 'Boneca Abayomi Tradicional Tecido Africano',
            'slug' => 'abayomi-tradicional',
            'price' => 119.90,
            'discount_price' => 89.90,
            'description' => '<p>A boneca Abayomi é um amuleto de proteção e alegria. Durante as viagens nos navios negreiros...</p><p>Ao adquirir esta boneca, você apoia as artesãs do Instituto.</p>',
            'attributes' => '<p><strong>Cor da Roupa:</strong> Estampa Geométrica Laranja</p><p><strong>Tamanho:</strong> 25 cm</p>',
            'stock' => 15,
            'is_active' => true,
        ]);

        $prod2 = Product::create([
            'category_id' => $catInclusao->id,
            'title' => 'Boneco Lucas Cadeirante',
            'slug' => 'cadeirante-lucas',
            'price' => 145.00,
            'discount_price' => null, // Sem desconto
            'description' => '<p>Lucas adora esportes e aventuras. Este boneco foi criado para trazer representatividade e naturalizar a deficiência física no universo lúdico.</p>',
            'attributes' => '<p><strong>Acessório:</strong> Cadeira de rodas inclusa</p><p><strong>Tamanho:</strong> 30 cm</p>',
            'stock' => 5,
            'is_active' => true,
        ]);

        // 3. Criar Imagens (Usando os placeholders por enquanto)
        ProductImage::create([
            'product_id' => $prod1->id,
            'image_path' => 'https://placehold.co/600x800/F3F3F3/31343C?text=Abayomi+Capa',
            'is_main' => true // Foto principal
        ]);
        
        ProductImage::create([
            'product_id' => $prod1->id,
            'image_path' => 'https://placehold.co/600x800/E8E8E8/31343C?text=Abayomi+Detalhe',
            'is_main' => false
        ]);

        ProductImage::create([
            'product_id' => $prod2->id,
            'image_path' => 'https://placehold.co/600x800/F3F3F3/31343C?text=Lucas+Capa',
            'is_main' => true // Foto principal
        ]);
    }
}