@extends('layouts.admin-panel')

@section('title', 'Cadastrar Produto')

@section('content')
    <div class="d-flex-between">
        <h1 class="admin-title" style="margin-bottom: 0;">Cadastrar Novo Produto (Boneca)</h1>
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
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid-2 form-group">
                <div>
                    <label class="form-label">Nome da Boneca *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="form-control" placeholder="Ex: Boneca Ariel">
                </div>
                <div>
                    <label class="form-label">Categoria *</label>
                    <select name="category_id" required class="form-control">
                        <option value="">Selecione...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid-3 form-group">
                <div>
                    <label class="form-label">Estoque *</label>
                    <input type="number" name="stock" value="{{ old('stock', 1) }}" required class="form-control">
                </div>
                <div>
                    <label class="form-label">Preço Normal (R$) *</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" required class="form-control" placeholder="149.90">
                </div>
                <div>
                    <label class="form-label">Preço Promo (Opcional)</label>
                    <input type="number" step="0.01" name="discount_price" value="{{ old('discount_price') }}" class="form-control" placeholder="119.90">
                </div>
            </div>

            <div class="form-section">
                <h3 style="margin-top: 0; margin-bottom: 15px; font-size: 1.1rem;">Dimensões (Obrigatório para calcular Frete)</h3>
                <div class="grid-4">
                    <div>
                        <label class="form-label" style="font-size: 0.9rem;">Peso (Kg)</label>
                        <input type="number" step="0.001" name="weight" value="{{ old('weight') }}" required class="form-control" placeholder="Ex: 0.300">
                    </div>
                    <div>
                        <label class="form-label" style="font-size: 0.9rem;">Comp. (cm)</label>
                        <input type="number" step="0.01" name="length" value="{{ old('length') }}" required class="form-control" placeholder="Ex: 20">
                    </div>
                    <div>
                        <label class="form-label" style="font-size: 0.9rem;">Largura (cm)</label>
                        <input type="number" step="0.01" name="width" value="{{ old('width') }}" required class="form-control" placeholder="Ex: 15">
                    </div>
                    <div>
                        <label class="form-label" style="font-size: 0.9rem;">Altura (cm)</label>
                        <input type="number" step="0.01" name="height" value="{{ old('height') }}" required class="form-control" placeholder="Ex: 35">
                    </div>
                </div>
            </div>

            <div class="image-upload-box">
                <label class="form-label">Fotos do Produto *</label>
                <input type="file" name="images[]" multiple accept="image/*" required class="form-control" style="border: none; padding: 0;">
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 10px;">Segure CTRL para selecionar várias. A primeira será a capa da loja.</p>
            </div>

            <div class="form-group">
                <label class="form-label">Descrição Completa</label>
                <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Atributos (O que você precisa saber)</label>
                <textarea name="attributes" rows="3" class="form-control" placeholder="Ex: Antialérgico, Costurado a mão...">{{ old('attributes') }}</textarea>
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" name="is_active" value="1" checked style="width: 20px; height: 20px;">
                <label class="form-label" style="margin: 0; cursor: pointer;">Produto Ativo (Visível na loja)</label>
            </div>

            <div style="text-align: right; margin-top: 30px; border-top: 1px solid var(--border-color); padding-top: 20px;">
                <button type="submit" class="btn-primary-custom" style="padding: 12px 30px; font-size: 1.1rem;">
                    Salvar Produto
                </button>
            </div>
        </form>
    </div>
@endsection