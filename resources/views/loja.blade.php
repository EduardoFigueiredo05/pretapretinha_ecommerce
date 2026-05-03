@extends('layouts.main')

@section('title', 'Loja Virtual | Preta Pretinha')

@section('content')
    <section class="store-hero">
        <div class="container center">
            <h1 class="fade-in">Conheça nosso Ateliê</h1>
            <p class="fade-in delay-1">Encontre a representatividade perfeita entre nossas coleções exclusivas.</p>
            
            <div class="search-bar-wrapper fade-in delay-1">
                <input type="text" placeholder="Buscar por boneca, coleção..." id="store-search">
                <button><i class="bi bi-search"></i></button>
            </div>
        </div>
    </section>

    <section class="store-layout container section" style="padding-top: 20px;">
        
        <div class="store-filters-top">
            <div class="macro-themes-scroll">
                <button class="macro-btn active" data-macro="todos">Todos os Universos</button>
                <button class="macro-btn" data-macro="Étnico-Racial">Étnico-Racial</button>
                <button class="macro-btn" data-macro="Inclusão & Deficiência">Inclusão & Deficiência</button>
            </div>

            <div class="collection-select-wrapper">
                <select id="collection-dropdown" class="modern-select">
                    <option value="todas">Ver todas as Coleções</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="product-grid" id="main-product-grid">
            @foreach($products as $product)
                <div class="product-card" data-macro="{{ $product->category->macro_theme }}" data-collection="{{ $product->category->slug }}">
                    
                    <a href="/produto/{{ $product->slug }}">
                        @php
                            $mainImage = $product->images->where('is_main', true)->first();
                            $imagePath = $mainImage ? $mainImage->image_path : 'https://placehold.co/400x400/F3F3F3/31343C?text=Sem+Foto';
                        @endphp
                        <img src="{{ $imagePath }}" alt="{{ $product->title }}" class="product-img">
                    </a>
                    
                    <div class="product-info">
                        <span class="collection-tag">{{ $product->category->name }}</span>
                        <h3>{{ $product->title }}</h3>
                        <span class="price">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                        
                        <a href="/produto/{{ $product->slug }}" class="btn-cart" style="text-align: center; text-decoration: none; display:block;">Ver detalhes</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection