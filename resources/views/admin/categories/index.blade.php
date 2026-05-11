@extends('layouts.admin-panel')

@section('content')
<div class="d-flex-between">
    <h1 class="admin-title">Gerenciar Categorias</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn-primary-custom">+ Nova Categoria</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tema</th>
                <th style="text-align: center;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td><strong>{{ $category->name }}</strong></td>
                <td>{{ $category->macro_theme ?? 'Nenhum' }}</td>
                <td style="text-align: center;">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" style="color: #2563eb; text-decoration: none; margin-right: 15px;">Editar</a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" style="color: #dc2626; background:none; border:none; cursor:pointer;">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection