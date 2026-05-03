<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Instituto Preta Pretinha')</title>
    
   <!-- Fontes do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Patrick+Hand&display=swap" rel="stylesheet">
    
    <!-- Ícones e CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- O CSS DO SWIPER ENTRA AQUI (Estava faltando) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
    
<!-- HEADER GLOBAL -->
    <header id="main-header">
        <div class="container nav-container">
            <a href="/" class="logo-wrapper" aria-label="Home Preta Pretinha">
                <img src="{{ asset('imgs/logo-preta-pretinha.png') }}" alt="Logo Preta Pretinha" class="logo-img">
            </a>
            
            <nav id="navbar">
                <button aria-label="Abrir Menu" id="mobile-menu-btn" aria-expanded="false">
                    <i class="bi bi-list"></i>
                </button>
                <ul class="nav-links">
                    <li><a href="/quem-somos">Quem Somos</a></li>
                    <!-- Adicionada a aba de mídia que constava no index original -->
                    <li><a href="/midia">Mídia & Celebs</a></li> 
                    <li><a href="/loja" class="{{ request()->is('loja*') ? 'active-link' : '' }}">Loja</a></li>
                    <li><a href="/galeria">Galeria</a></li>
                    <li><a href="/contato" class="btn-highlight">Contato</a></li>
                    
                    <!-- Carrinho movido para DENTRO da lista para respeitar o space-between do CSS -->
                    <li class="cart-icon-wrapper">
                        <a href="/carrinho" aria-label="Carrinho de Compras">
                            <i class="bi bi-bag-fill"></i>
                            <span class="cart-badge">0</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- O CONTEÚDO DE CADA PÁGINA VAI ENTRAR AQUI -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER GLOBAL CORRIGIDO -->
    <footer id="main-footer" class="main-footer">
        <div class="container footer-grid">
            <div class="footer-col">
                <h3>Instituto Preta Pretinha</h3>
                <p class="footer-desc">Um Ponto de Cultura que honra a dignidade humana através da arte, diversidade e inclusão.</p>
            </div>

            <div class="footer-col">
                <h4>Contato</h4>
                <p><i class="bi bi-geo-alt-fill"></i> Rua Exemplo, 123 - Vila Madalena, SP</p>
                <p><i class="bi bi-whatsapp"></i> (11) 99999-9999</p>
                <p><i class="bi bi-envelope-fill"></i> contato@pretapretinha.com.br</p>
            </div>

            <div class="footer-col">
                <h4>Siga-nos</h4>
                <div class="social-icons">
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Youtube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>

        <div class="sub-footer">
            <div class="container sub-footer-content">
                <p>&copy; 2026 Instituto Preta Pretinha. Todos os direitos reservados.</p>
                <p class="dev-tag">Desenvolvido por <a href="#"><span class="ef-highlight"> Consultorias EF</span></a></p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('script.js') }}"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>