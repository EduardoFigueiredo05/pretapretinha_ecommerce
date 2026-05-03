@extends('layouts.main')

@section('title', $product->title . ' | Preta Pretinha')

@section('content')
<div class="container section" style="padding-top: 40px; padding-bottom: 80px;">
    
    <nav class="breadcrumb">
        <a href="/">Home</a> &gt; 
        <a href="/loja">Loja</a> &gt; 
        <span>{{ $product->category->name }}</span> &gt; 
        <span>{{ $product->title }}</span>
    </nav>

    <div class="product-detail-container">
        
        <div class="product-gallery">
            <div class="gallery-thumbnails">
                @foreach($product->images as $index => $image)
                    <img src="{{ asset($image->image_path) }}" 
                         alt="Ângulo {{ $index + 1 }}" 
                         class="thumb-img {{ $image->is_main ? 'active-thumb' : '' }}" 
                         data-full="{{ asset($image->image_path) }}">
                @endforeach
            </div>

            <div class="gallery-main-image">
                @php
                    $mainImg = $product->images->where('is_main', true)->first();
                    $defaultPath = $mainImg ? $mainImg->image_path : 'https://placehold.co/600x800/F3F3F3/31343C?text=Sem+Foto';
                @endphp
                <img id="main-product-img" src="{{ asset($defaultPath) }}" alt="{{ $product->title }}">
            </div>
        </div>

        <div class="product-info-panel">
            <span class="product-condition">{{ $product->category->macro_theme }}</span>
            
            <h1 class="product-title">{{ $product->title }}</h1>
            
            <div class="product-pricing">
                @if($product->discount_price)
                    <span class="old-price">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                    <div class="current-price-row">
                        <span class="price-symbol">R$</span>
                        @php
                            $priceParts = explode('.', $product->discount_price);
                        @endphp
                        <span class="price-value">{{ $priceParts[0] }}</span>
                        <span class="price-cents">{{ str_pad($priceParts[1] ?? '00', 2, '0', STR_PAD_RIGHT) }}</span>
                    </div>
                @else
                    <div class="current-price-row">
                        <span class="price-symbol">R$</span>
                        @php
                            $priceParts = explode('.', $product->price);
                        @endphp
                        <span class="price-value">{{ $priceParts[0] }}</span>
                        <span class="price-cents">{{ str_pad($priceParts[1] ?? '00', 2, '0', STR_PAD_RIGHT) }}</span>
                    </div>
                @endif
                
                <span class="installments">em até <strong>3x sem juros</strong> no cartão</span>
            </div>

            <div class="product-attributes">
                {!! $product->attributes !!}
            </div>

            <div class="product-actions">
                <button class="btn-buy-now">Comprar agora</button>
                <button class="btn-add-cart">Adicionar à sacola</button>
            </div>
        </div>
    </div>

    <div class="product-full-description">
        <h2>Descrição do Produto</h2>
        {!! $product->description !!}
    </div>

</div>
@endsection