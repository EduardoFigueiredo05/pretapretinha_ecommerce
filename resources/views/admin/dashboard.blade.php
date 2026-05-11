@extends('layouts.admin-panel')

@section('title', 'Dashboard')

@section('content')
    <h1 class="admin-title">Resumo da Loja</h1>

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px;">
        
        <div class="admin-card" style="border-left: 4px solid var(--primary-color);">
            <p style="color: var(--text-muted); margin: 0 0 5px 0;">Total de Produtos</p>
            <h2 style="margin: 0; font-size: 2rem;">{{ $totalProducts }}</h2>
        </div>

        <div class="admin-card" style="border-left: 4px solid #10b981;">
            <p style="color: var(--text-muted); margin: 0 0 5px 0;">Produtos Ativos</p>
            <h2 style="margin: 0; font-size: 2rem;">{{ $activeProducts }}</h2>
        </div>

        <div class="admin-card" style="border-left: 4px solid #ef4444;">
            <p style="color: var(--text-muted); margin: 0 0 5px 0;">Estoque Baixo (3 ou menos)</p>
            <h2 style="margin: 0; font-size: 2rem; color: #ef4444;">{{ $lowStock }}</h2>
        </div>

    </div>

    <div class="admin-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0;">Últimas Adições</h3>
            <a href="{{ route('admin.products.create') }}" class="btn-primary-custom">+ Novo Produto</a>
        </div>

        @if($recentProducts->isEmpty())
            <p style="color: var(--text-muted);">Nenhum produto cadastrado ainda.</p>
        @else
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="border-bottom: 2px solid var(--border-color);">
                        <th style="padding: 10px;">Produto</th>
                        <th style="padding: 10px;">Preço</th>
                        <th style="padding: 10px;">Estoque</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentProducts as $product)
                        <tr style="border-bottom: 1px solid var(--border-color);">
                            <td style="padding: 15px 10px; font-weight: bold;">{{ $product->title }}</td>
                            <td style="padding: 15px 10px;">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td style="padding: 15px 10px;">
                                <span style="background: {{ $product->stock <= 3 ? '#fee2e2' : '#dcfce7' }}; 
                                             color: {{ $product->stock <= 3 ? '#991b1b' : '#166534' }}; 
                                             padding: 4px 8px; border-radius: 12px; font-size: 0.85rem;">
                                    {{ $product->stock }} un
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection