<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin</title>
    
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

    <aside class="admin-sidebar">
        <div class="sidebar-header">
            <h2><i class="bi bi-stars"></i> Preta Pretinha</h2>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door me-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.products.index') }}" class="nav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam me-2"></i> Produtos
            </a>
            <a href="{{ route('loja') }}" target="_blank" class="nav-item mt-4" style="color: #9ca3af;">
                <i class="bi bi-box-arrow-up-right me-2"></i> Ver Loja
            </a>
        </nav>
    </aside>

    <main class="admin-main">
        @yield('content')
    </main>

</body>
</html>