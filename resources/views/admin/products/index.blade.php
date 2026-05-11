@extends('layouts.admin-panel')

@section('title', 'Gerenciar Produtos')

@section('content')
    <div class="d-flex-between">
        <h1 class="admin-title" style="margin-bottom: 0;">Gerenciar Produtos (Bonecas)</h1>
        <a href="{{ route('admin.products.create') }}" class="btn-primary-custom">+ Novo Produto</a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Status</th>
                    <th style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td style="color: var(--text-muted);">#{{ $product->id }}</td>
                        <td style="font-weight: bold;">{{ $product->title }}</td>
                        <td>{{ $product->category->name ?? 'Sem categoria' }}</td>
                        <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if($product->is_active)
                                <span class="badge-active">Ativo</span>
                            @else
                                <span class="badge-inactive">Inativo</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('admin.products.edit', $product->id) }}" style="color: #2563eb; text-decoration: none; margin-right: 15px; font-weight: 500;">Editar</a>
                            
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Tem certeza que deseja excluir esta boneca?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: #dc2626; background: none; border: none; cursor: pointer; font-size: 1rem; font-weight: 500;">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding: 30px; text-align: center; color: var(--text-muted);">
                            Nenhum produto cadastrado ainda. 
                            <a href="{{ route('admin.products.create') }}" style="color: var(--primary-color); font-weight: bold;">Cadastre o primeiro!</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection