@extends('layouts.main')

@section('title', 'Instituto Preta Pretinha | Vida é Diversidade!')

@section('content')
    <!-- HERO SECTION -->
    <section id="home" class="hero">
        <div class="container hero-grid">
            <div class="hero-text fade-in">
                <span class="tagline">Vida é Diversidade!</span>
                <h1>Honrando a <span class="text-highlight">dignidade humana</span> em cada detalhe.</h1>
                <p>Conheça as bonecas que educam, incluem e encantam gerações. Um ponto de cultura liderado por mulheres negras.</p>
                
                <div class="cta-group">
                    <a href="/loja" class="btn-primary">Ir para Loja Virtual</a>
                    <a href="/quem-somos" class="btn-secondary">Nossa História</a>
                </div>
            </div>
            <div class="hero-image fade-in delay-1">
                <div class="blob-mask">
                    <img src="{{ asset('imgs/logo-preta-pretinha.png') }}" alt="Logo Preta Pretinha" class="img-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- QUEM SOMOS -->
    <section id="quem-somos" class="section bg-pattern">
        <div class="container">
            <div class="section-header center">
                <h2 class="section-title center">A Força das Irmãs</h2>
                <p>A união de Joyce, Lúcia e Cristina transformou um sonho em legado.</p>
            </div>
            <div class="sisters-grid">
                <article class="sister-card">
                    <img src="{{ asset('imgs/fotoJoyce1.svg') }}" alt="Joyce" class="img-circle">
                    <h3>Joyce</h3>
                    <p>Educação e Pedagogia</p>
                </article>
                <article class="sister-card">
                    <img src="{{ asset('imgs/fotoLucia1.svg') }}" alt="Lúcia" class="img-circle">
                    <h3>Lúcia</h3>
                    <p>Criação e Arte</p>
                </article>
                <article class="sister-card">
                    <img src="{{ asset('imgs/fotoCristina1.svg') }}" alt="Cristina" class="img-circle">
                    <h3>Cristina</h3>
                    <p>Gestão e Expansão</p>
                </article>
            </div>
            <div class="center mt-2">
                <a href="/quem-somos" class="btn-text">Ler a história completa &rarr;</a>
            </div>
        </div>
    </section>

    <!-- PRETA NA MÍDIA -->
    <section id="midia" class="section">
        <div class="container">
            <h2 class="section-title">Preta na Mídia</h2>
            <div class="media-scroller">
                <div class="media-card">
                    <span class="media-tag">Record TV</span>
                    <h4>Entrevista com Mion</h4>
                    <p>Falando sobre brinquedos inclusivos e impacto social.</p>
                    <a href="https://youtu.be/Zkb8oxf17zw" style="text-decoration: underline;">Confira!</a>
                </div>
                <div class="media-card">
                    <span class="media-tag">Revista Raça</span>
                    <h4>Capa da Edição 2024</h4>
                    <p>Empreendedorismo negro feminino em destaque.</p>
                    <a href="{{url('/midia#areaRevista')}}" style="text-decoration: underline;">Confira!</a>
                </div>
                <div class="media-card">
                    <span class="media-tag">Corrida com a Tocha Olímpica</span>
                    <h4>Preta Pretinha na olímpiadas de 2016</h4>
                    <p>Levando a diversidade para os esportes!</p>
                     <a href="{{ url('/midia#tochaOlimpica') }}" style="text-decoration: underline;">Confira!</a>
                </div>
                <div class="media-card">
                    <span class="media-tag">Portal G1</span>
                    <h4>Diversidade em Pauta</h4>
                    <p>Reportagem especial sobre bonecas com deficiência.</p>
                     <a href="#" style="text-decoration: underline;">Confira!</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CELEBRIDADES -->
    <section id="celebridades" class="section bg-yellow-light">
        <div class="container">
            <h2 class="section-title center">Quem Apoia a Causa</h2>
            <div class="celebs-grid">
                <div class="celeb-block">
                    <img src="{{ asset('imgs/lazaroramos.webp') }}" alt="Lázaro Ramos" class="celeb-photo">
                    <div class="celeb-content">
                        <h3>Lázaro Ramos</h3>
                        <p class="celeb-role">Ator e Escritor</p>
                        <p class="celeb-quote">"O trabalho da Preta Pretinha é essencial para a construção da identidade das nossas crianças."</p>
                    </div>
                </div>
                <div class="celeb-block">
                    <img src="{{ asset('imgs/majucoutinho.webp') }}" alt="Maju Coutinho" class="celeb-photo">
                    <div class="celeb-content">
                        <h3>Maju Coutinho</h3>
                        <p class="celeb-role">Jornalista</p>
                        <p class="celeb-quote">"Fiquei encantada ao visitar o acervo. Ver a diversidade representada com tanta delicadeza é emocionante."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERIA DA PRETA -->
    <section id="galeria" class="section">
        <div class="container">
            <h2 class="section-title center">Galeria da Preta</h2>
            <div class="gallery-masonry">
                <img src="{{ asset('imgs/carnaval.jpeg') }}" alt="Oficinas" class="gallery-item size-lg">
                <img src="{{ asset('imgs/escolazilda.jpeg') }}" alt="Visitas" class="gallery-item">
                <img src="{{ asset('imgs/producaoBonecas.JPG') }}" alt="Produção" class="gallery-item">
                <img src="{{ asset('imgs/CAPIVARI ESCOLA 4.png') }}" alt="Eventos" class="gallery-item size-wide">
            </div>
            <div class="center mt-2">
                <a href="/galeria" class="btn-outline-dark">Ver Galeria Completa</a>
            </div>
        </div>
    </section>

    <!-- DEPOIMENTOS -->
    <section id="depoimentos-clientes" class="section bg-light">
        <div class="container small-container center">
            <span class="icon-quote">❝</span>
            <div class="testimonial-slider">
                <div class="testimonial-slide active">
                    <h3 class="testimonial-text">"Minha filha se viu pela primeira vez em uma boneca. Isso não tem preço. Obrigada por existirem."</h3>
                    <p class="testimonial-author">— Mariana, mãe da Sofia</p>
                </div>
            </div>
            <div class="dots-nav">
                <span class="dot active"></span>
                <span class="dot"></span>
            </div>
        </div>
    </section>

    <!-- PREVIEW DA LOJA -->
    <section id="loja" class="section bg-yellow">
        <div class="container">
            <div class="shop-header">
                <h2>Nossas Bonecas</h2>
                <a href="/loja" class="btn-outline-dark">Ver Loja Completa</a>
            </div>
            <div class="product-grid">
                <div class="product-card">
                    <img src="{{ asset('imgs/Bonecas/boneca1.png') }}" alt="Boneca Abayomi" class="product-img">
                    <div class="product-info">
                        <h3>Boneca Abayomi</h3>
                        <span class="price">R$ 89,90</span>
                        <a href="/loja" class="btn-cart" style="display:block; text-align:center;">Comprar</a>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('imgs/Bonecas/boneca1.png') }}" alt="Boneca Indígena" class="product-img">
                    <div class="product-info">
                        <h3>Boneca Indígena</h3>
                        <span class="price">R$ 120,00</span>
                        <a href="/loja" class="btn-cart" style="display:block; text-align:center;">Comprar</a>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('imgs/Bonecas/boneca1.png') }}" alt="Boneco Cadeirante" class="product-img">
                    <div class="product-info">
                        <h3>Boneco Cadeirante</h3>
                        <span class="price">R$ 145,00</span>
                        <a href="/loja" class="btn-cart" style="display:block; text-align:center;">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RECONHECIMENTO (CERTIFICADOS) -->
    <section id="certificados" class="section">
        <div class="container">
            <h2 class="section-title center">Reconhecimento</h2>
            <div class="logos-grid">
                <!-- Se essas logos estiverem em outra pasta, ajuste o caminho dentro do asset() -->
                <img src="{{ asset('imgs/certificadoPontoCultura.png') }}" alt="Prêmio A" class="cert-logo">
                <img src="{{ asset('imgs/logo-premio2.png') }}" alt="Selo Diversidade" class="cert-logo">
                <img src="{{ asset('imgs/logo-premio3.png') }}" alt="UNESCO" class="cert-logo">
            </div>
        </div>
    </section>
@endsection