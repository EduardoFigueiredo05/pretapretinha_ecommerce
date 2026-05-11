@extends('layouts.admin-panel')

@section('title', 'Editar Produto')

@section('content')
    <div class="d-flex-between">
        <h1 class="admin-title" style="margin-bottom: 0;">Editar Produto: {{ $product->title }}</h1>
        <a href="{{ route('admin.products.index') }}" style="color: var(--text-muted); text-decoration: none; font-weight: bold;">&larr; Voltar</a>
    </div>

    @if ($errors->any())
        <div class="alert-danger">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="admin-card">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid-2 form-group">
                <div>
                    <label class="form-label">Nome da Boneca *</label>
                    <input type="text" name="title" value="{{ old('title', $product->title) }}" required class="form-control">
                </div>
                <div>
                    <label class="form-label">Categoria *</label>
                    <select name="category_id" required class="form-control">
                        <option value="">Selecione...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid-3 form-group">
                <div>
                    <label class="form-label">Estoque *</label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required class="form-control">
                </div>
                <div>
                    <label class="form-label">Preço Normal (R$) *</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required class="form-control">
                </div>
                <div>
                    <label class="form-label">Preço Promo (Opcional)</label>
                    <input type="number" step="0.01" name="discount_price" value="{{ old('discount_price', $product->discount_price) }}" class="form-control">
                </div>
            </div>

            <div class="form-section">
                <h3 style="margin-top: 0; margin-bottom: 15px; font-size: 1.1rem;">Dimensões (Frete)</h3>
                <div class="grid-4">
                    <div>
                        <label class="form-label" style="font-size: 0.9rem;">Peso (Kg)</label>
                        <input type="number" step="0.001" name="weight" value="{{ old('weight', $product->weight) }}" required class="form-control">
                    </div>
                    <div>
                        <label class="form-label" style="font-size: 0.9rem;">Comp. (cm)</label>
                        <input type="number" step="0.01" name="length" value="{{ old('length', $product->length) }}" required class="form-control">
                    </div>
                    <div>
                        <label class="form-label" style="font-size: 0.9rem;">Largura (cm)</label>
                        <input type="number" step="0.01" name="width" value="{{ old('width', $product->width) }}" required class="form-control">
                    </div>
                    <div>
                        <label class="form-label" style="font-size: 0.9rem;">Altura (cm)</label>
                        <input type="number" step="0.01" name="height" value="{{ old('height', $product->height) }}" required class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Descrição Completa</label>
                <textarea name="description" rows="4" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Atributos (O que você precisa saber)</label>
                <textarea name="attributes" rows="3" class="form-control">{{ old('attributes', $product->attributes) }}</textarea>
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }} style="width: 20px; height: 20px;">
                <label class="form-label" style="margin: 0; cursor: pointer;">Produto Ativo (Visível na loja)</label>
            </div>

            <div style="text-align: right; margin-top: 30px; border-top: 1px solid var(--border-color); padding-top: 20px;">
                <button type="submit" class="btn-primary-custom" style="padding: 12px 30px; font-size: 1.1rem;">
                    Atualizar Produto
                </button>
            </div>
        </form>
    </div>
@endsection