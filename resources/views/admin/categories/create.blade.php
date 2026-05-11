@extends('layouts.admin-panel')

@section('title', 'Nova Categoria')

@section('content')
    <div class="d-flex-between">
        <h1 class="admin-title" style="margin-bottom: 0;">Cadastrar Nova Categoria</h1>
        <a href="{{ route('admin.categories.index') }}" style="color: var(--text-muted); text-decoration: none; font-weight: bold;">&larr; Voltar</a>
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
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="grid-2 form-group">
                <div>
                    <label class="form-label">Nome da Categoria *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="form-control" placeholder="Ex: Bonecas Inclusivas">
                    <small style="color: var(--text-muted);">O link amigável (slug) será gerado automaticamente.</small>
                </div>
                <div>
                    <label class="form-label">Tema Principal (Macro Theme)</label>
                    <input type="text" name="macro_theme" value="{{ old('macro_theme') }}" class="form-control" placeholder="Ex: Diversidade">
                </div>
            </div>

            <div style="text-align: right; margin-top: 30px; border-top: 1px solid var(--border-color); padding-top: 20px;">
                <button type="submit" class="btn-primary-custom" style="padding: 12px 30px; font-size: 1.1rem;">
                    Salvar Categoria
                </button>
            </div>
        </form>
    </div>
@endsection