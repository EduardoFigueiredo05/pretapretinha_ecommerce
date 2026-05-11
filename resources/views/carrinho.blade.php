@extends('layouts.main')

@section('title', 'Minha Sacola | Preta Pretinha')

@section('content')
<div class="container section" style="padding-top: 40px; padding-bottom: 80px;">
    
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 30px;">
        <h1 style="font-size: 2rem; color: #111; margin: 0;">Minha Sacola</h1>
        <a href="{{ route('loja') }}" style="color: #666; text-decoration: underline; font-size: 0.95rem;">Continuar comprando</a>
    </div>

    <!-- Mensagem de Sucesso (Ex: Produto adicionado/removido) -->
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #bbf7d0; font-weight: bold;">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        </div>
    @endif

    <!-- LÓGICA DO CARRINHO -->
    @if(count($cart) > 0)
        
        <div class="cart-layout">
            
            <!-- COLUNA ESQUERDA: LISTA DE PRODUTOS -->
            <div class="cart-items-container">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço Unitário</th>
                            <th style="text-align: center;">Quantidade</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        
                        @foreach($cart as $id => $details)
                            @php
                                $subtotal = $details['price'] * $details['quantity'];
                                $total += $subtotal;
                            @endphp
                            
                            <tr>
                                <!-- Imagem e Título -->
                                <td>
                                    <div class="cart-product-info">
                                        <img src="{{ $details['image'] }}" alt="{{ $details['title'] }}">
                                        <span class="cart-product-title">{{ $details['title'] }}</span>
                                    </div>
                                </td>
                                
                                <!-- Preço Unitário -->
                                <td class="cart-price">R$ {{ number_format($details['price'], 2, ',', '.') }}</td>
                                
                                <!-- Quantidade -->
                                <td style="text-align: center;">
                                    <div class="cart-qtd">{{ $details['quantity'] }}</div>
                                </td>
                                
                                <!-- Subtotal do Item -->
                                <td class="cart-subtotal">R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                                
                                <!-- Botão de Remover -->
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST" style="margin: 0;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="btn-remove-item" title="Remover item">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- COLUNA DIREITA: RESUMO DO PEDIDO -->
            <div class="cart-summary">
                <h3>Resumo do Pedido</h3>
                
                <div class="summary-row">
                    <span>Subtotal ({{ count($cart) }} itens)</span>
                    <span>R$ {{ number_format($total, 2, ',', '.') }}</span>
                </div>
                
                <div class="summary-row shipping-row">
                    <span>Frete</span>
                    <span style="color: #666; font-size: 0.9rem;">Calculado no pagamento</span>
                </div>

                <div class="summary-total">
                    <span>Total estimado</span>
                    <span>R$ {{ number_format($total, 2, ',', '.') }}</span>
                </div>

             <a href="{{ route('checkout') }}" class="btn-checkout" style="text-decoration: none;">Ir para o Pagamento <i class="bi bi-arrow-right" style="margin-left: 8px;"></i></a>
                
                <div style="text-align: center; margin-top: 15px;">
                    <i class="bi bi-shield-lock" style="color: #166534;"></i> <span style="font-size: 0.85rem; color: #666;">Compra 100% segura</span>
                </div>
            </div>

        </div>

    @else
        <!-- TELA DE SACOLA VAZIA -->
        <div class="empty-cart">
            <i class="bi bi-bag-x"></i>
            <h2>Sua sacola está vazia</h2>
            <p>Que tal explorar nosso ateliê e adicionar algumas peças incríveis?</p>
            <a href="{{ route('loja') }}" class="btn-buy-now" style="text-decoration: none; display: inline-block; padding: 15px 30px;">Explorar Loja</a>
        </div>
    @endif

</div>

<!-- ESTILOS ESPECÍFICOS DO CARRINHO -->
<style>
    /* Grid Principal */
    .cart-layout {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 40px;
        align-items: start;
    }

    /* Tabela de Itens */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        border: 1px solid #eee;
    }

    .cart-table th {
        text-align: left;
        padding: 15px 20px;
        background: #f8f9fa;
        border-bottom: 2px solid #eee;
        color: #555;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
    }

    .cart-table td {
        padding: 20px;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
    }

    .cart-product-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .cart-product-info img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #eee;
    }

    .cart-product-title {
        font-weight: bold;
        font-size: 1.1rem;
        color: #111;
    }

    .cart-price, .cart-subtotal {
        color: #555;
    }

    .cart-subtotal {
        color: #111;
        font-weight: bold;
        font-size: 1.1rem;
    }

    .cart-qtd {
        background: #f8f9fa;
        padding: 8px 20px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-weight: bold;
        display: inline-block;
    }

    .btn-remove-item {
        background: none;
        border: none;
        color: #dc2626;
        cursor: pointer;
        font-size: 1.2rem;
        transition: 0.2s;
        padding: 10px;
    }

    .btn-remove-item:hover {
        color: #991b1b;
        transform: scale(1.1);
    }

    /* Resumo Lateral */
    .cart-summary {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 12px;
        border: 1px solid #e9ecef;
    }

    .cart-summary h3 {
        margin-bottom: 25px;
        font-size: 1.3rem;
        border-bottom: 2px solid #FFB800;
        padding-bottom: 10px;
        display: inline-block;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        color: #333;
        font-size: 1.05rem;
    }

    .shipping-row {
        padding-bottom: 20px;
        border-bottom: 1px solid #dee2e6;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        margin-bottom: 30px;
        font-size: 1.5rem;
        font-weight: bold;
        color: #111;
    }

    .btn-checkout {
        width: 100%;
        background: #111;
        color: #FFB800;
        border: none;
        padding: 18px;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-checkout:hover {
        background: #333;
    }

    /* Estado Vazio */
    .empty-cart {
        text-align: center;
        padding: 80px 20px;
        background: #f8f9fa;
        border-radius: 12px;
        border: 2px dashed #dee2e6;
    }

    .empty-cart i {
        font-size: 4rem;
        color: #adb5bd;
        margin-bottom: 20px;
        display: block;
    }

    .empty-cart h2 {
        font-size: 1.8rem;
        margin-bottom: 10px;
        color: #111;
    }

    .empty-cart p {
        color: #666;
        margin-bottom: 30px;
        font-size: 1.1rem;
    }

    /* Responsivo Mobile */
    @media (max-width: 768px) {
        .cart-layout {
            grid-template-columns: 1fr;
        }
        .cart-table th { display: none; }
        .cart-table td { display: block; text-align: center; border: none; padding: 10px; }
        .cart-product-info { flex-direction: column; text-align: center; gap: 5px; }
        .cart-table tr { border-bottom: 2px solid #eee; padding-bottom: 20px; display: block; margin-bottom: 20px; }
    }
</style>
@endsection