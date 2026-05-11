@extends('layouts.main')

@section('title', $product->title . ' | Preta Pretinha')

@section('content')
<div class="container section" style="padding-top: 40px; padding-bottom: 80px;">

    <nav class="breadcrumb">
        <a href="/">Home</a> &gt;
        <a href="/loja">Loja</a> &gt;
        <span>{{ $product->category->name ?? 'Coleção' }}</span> &gt;
        <span>{{ $product->title }}</span>
    </nav>

    <div class="product-detail-container">

        <!-- GALERIA -->
        <div class="product-gallery">
            <div class="gallery-thumbnails">
                @foreach($product->images as $index => $image)
                <img src="{{ asset('storage/' . $image->image_path) }}"
                    alt="Ângulo {{ $index + 1 }}"
                    class="thumb-img {{ $image->is_main ? 'active-thumb' : '' }}"
                    onclick="changeMainImage(this)">
                @endforeach
            </div>

            <div class="gallery-main-image">
                @php
                $mainImg = $product->images->where('is_main', true)->first() ?? $product->images->first();
                $defaultPath = $mainImg ? asset('storage/' . $mainImg->image_path) : '';
                @endphp
                <img id="main-product-img" src="{{ $defaultPath }}" alt="{{ $product->title }}">
            </div>
        </div>

        <!-- INFORMAÇÕES -->
        <div class="product-info-panel">
            <span class="product-condition">{{ $product->category->macro_theme ?? 'Exclusivo' }}</span>

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

            <!-- ATRIBUTOS (Agora renderizando HTML corretamente) -->
            <div class="product-attributes">
                {!! $product->attributes !!}
            </div>

            <!-- AÇÕES DE COMPRA -->
            <form action="{{route('cart.add')}}" method="POST" id="add-to-cart-form" style="margin-top: 20px;">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                    <!-- Seletor de Quantidade -->
                    <div style="display: flex; align-items: center; border: 1px solid #ccc; border-radius: 8px; overflow: hidden; width: 120px; background: #fff;">
                        <button type="button" onclick="updateQtd(-1)" style="padding: 10px 15px; border: none; background: transparent; cursor: pointer; font-weight: bold;">-</button>
                        <input type="number" id="qtd-input" name="quantity" value="1" min="1" max="{{ $product->stock }}" style="width: 100%; text-align: center; border: none; outline: none; font-weight: bold; pointer-events: none;">
                        <button type="button" onclick="updateQtd(1)" style="padding: 10px 15px; border: none; background: transparent; cursor: pointer; font-weight: bold;">+</button>
                    </div>

                    <!-- Usando suas classes originais -->
                    <div class="product-actions" style="flex: 1; padding: 0; margin: 0; border: none;">
                        <button type="button" class="btn-buy-now">Comprar agora</button>
                        <button type="submit" class="btn-add-cart">Adicionar à sacola</button>
                    </div>
                </div>
            </form>

            <!-- CALCULADORA DE FRETE -->
            <div class="shipping-calculator" style="background: #f8f9fa; padding: 20px; border-radius: 12px; border: 1px solid #e9ecef; margin-top: 20px;">
                <h4 style="margin-bottom: 15px; font-size: 1rem;"><i class="bi bi-truck"></i> Simular Frete e Prazos</h4>

                <div style="display: flex; gap: 10px;">
                    <input type="text" id="cep-input" placeholder="00000-000" maxlength="9" style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                    <button type="button" onclick="simulateShipping()" style="padding: 10px 15px; background: #111; color: #FFB800; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">Calcular</button>
                </div>

                <div id="shipping-results" style="margin-top: 15px; display: none;"></div>
            </div>

        </div>
    </div>

    <!-- DESCRIÇÃO COMPLETA -->
    <div class="product-full-description" style="margin-top: 50px;">
        <h2>Descrição do Produto</h2>
        {!! $product->description !!}
    </div>

</div>

<!-- SCRIPTS DA PÁGINA -->
<script>
    // 1. Trocar foto principal
    function changeMainImage(element) {
        document.getElementById('main-product-img').src = element.src;
        document.querySelectorAll('.thumb-img').forEach(img => img.classList.remove('active-thumb'));
        element.classList.add('active-thumb');
    }

    // 2. Controlador de Quantidade
    function updateQtd(change) {
        const input = document.getElementById('qtd-input');
        let currentVal = parseInt(input.value);
        const maxStock = parseInt(input.max);

        let newVal = currentVal + change;
        if (newVal >= 1 && newVal <= maxStock) {
            input.value = newVal;
        }
    }

    // 3. Simulação de Frete Visual
    function simulateShipping() {
        const cep = document.getElementById('cep-input').value;
        const resultsDiv = document.getElementById('shipping-results');

        if (cep.length < 8) {
            alert("Por favor, digite um CEP válido.");
            return;
        }

        resultsDiv.style.display = 'block';
        resultsDiv.innerHTML = '<p style="font-size:0.9rem; color:#666;"><i class="bi bi-hourglass-split"></i> Calculando...</p>';

        setTimeout(() => {
            resultsDiv.innerHTML = `
                <div style="background: white; border: 1px solid #eee; border-radius: 8px; padding: 15px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.95rem;">
                        <span><i class="bi bi-box-seam"></i> <strong>PAC</strong> (5 a 8 dias úteis)</span>
                        <span style="font-weight: bold; color: #166534;">R$ 22,50</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; font-size: 0.95rem;">
                        <span><i class="bi bi-lightning-charge"></i> <strong>SEDEX</strong> (1 a 3 dias úteis)</span>
                        <span style="font-weight: bold; color: #111;">R$ 45,90</span>
                    </div>
                </div>
            `;
        }, 1200);
    }

    // Máscara simples de CEP
    document.getElementById('cep-input').addEventListener('input', function(e) {
        let x = e.target.value.replace(/\D/g, '').match(/(\d{0,5})(\d{0,3})/);
        e.target.value = !x[2] ? x[1] : x[1] + '-' + x[2];
    });
</script>
@endsection