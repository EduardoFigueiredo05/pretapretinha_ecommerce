@extends('layouts.main')

@section('title', 'Mídia e Celebs | Instituto Preta Pretinha')

@section('content')
    <!-- HERO SECTION DA MÍDIA -->
    <section class="page-hero bg-yellow-pale">
        <div class="container center">
            <span class="tagline" style="background: transparent; color: var(--color-black); border: 1px solid var(--color-black);">Imprensa & Reconhecimento</span>
            <h1 class="fade-in" style="font-size: 3.5rem; margin-top: 15px;">A voz da inclusão ecoando</h1>
            <p class="fade-in delay-1" style="font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Veja quem apoia a nossa causa e como o nosso trabalho vem transformando a narrativa na mídia brasileira e internacional.</p>
        </div>
    </section>

    <!-- SEÇÃO DE VÍDEO E ENTREVISTA -->
    <section class="section-cinema" style="background-color: var(--color-black); color: white; padding: 80px 0;">
        <div class="container">
            <div class="cinema-grid" style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 60px; align-items: center;">
                
                <div class="cinema-text fade-in">
                    <span class="tag-highlight" style="background: var(--color-yellow); color: var(--color-black); padding: 5px 12px; border-radius: 4px; font-weight: 700; text-transform: uppercase; font-size: 0.8rem;">Entrevista Especial</span>
                    <h2 style="color: white; margin-top: 15px; font-size: 2.2rem;">O Legado de Uma Família</h2>
                    <p class="lead-text" style="font-size: 1.1rem; font-style: italic; border-left: 3px solid var(--color-yellow); padding-left: 15px; margin-bottom: 20px; color: #ddd;">"Muitas pessoas falavam que eu era louca de fazer bonecas negras, que não venderia..."</p>
                    <p style="color: #ccc; margin-bottom: 15px;">Nesta entrevista emocionante, Joyce Venâncio abre o coração sobre a gênese do Instituto Preta Pretinha. Ela relembra o choro por não se ver representada nos brinquedos e a atitude revolucionária de sua avó, que costurou a primeira boneca negra da família.</p>
                </div>

                <div class="video-wrapper-special fade-in delay-1" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 16px; border: 2px solid rgba(255,255,255,0.1);">
                    <iframe 
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                        src="https://www.youtube.com/embed/Zkb8oxf17zw?si=Q1A2B3C4D5E6F7G8" 
                        title="Entrevista Instituto Preta Pretinha" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen>
                    </iframe>
                </div>

            </div>
        </div>
    </section>

    <!-- NOVA SEÇÃO: MARCOS GLOBAIS / HISTÓRICOS -->
    <section class="section bg-light">
        <div class="container">
            <h2 class="section-title center mb-large">Marcos Internacionais</h2>

            <!-- A Pequena Sereia -->
            <div class="zig-zag-row">
                <div class="zig-text">
                    <span class="tag-highlight" style="background: var(--color-black); color: var(--color-yellow); margin-bottom: 15px;">Cinema & Representatividade</span>
                    <h3 style="font-size: 2.5rem;">O Elenco de "A Pequena Sereia"</h3>
                    <p class="subtitle" style="font-size: 1.1rem;">Encontro com Halle Bailey e Javier Bardem</p>
                    <p>Um dos momentos mais mágicos da nossa trajetória! O Instituto Preta Pretinha teve a honra de ser convidado para entregar bonecos exclusivos aos astros do live-action da Disney, <strong>A Pequena Sereia</strong>.</p>
                    <p>Halle Bailey (Ariel) e Javier Bardem (Rei Tritão) receberam versões em pano de seus personagens, um encontro emocionante que celebrou a importância da representatividade negra nas maiores telas do mundo.</p>
                </div>
                <!-- Mini Grid de Imagens para o Filme -->
                <div class="zig-img" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <img src="{{ asset('imgs/HaileBaileyComABoneca.jpeg') }}" alt="Halle Bailey com a boneca Ariel" class="img-frame" style="height: 100%; object-fit: cover;">
                    <img src="{{ asset('imgs/FotoComJavierBardem.jpeg') }}" alt="Javier Bardem com o boneco Tritão" class="img-frame" style="height: 100%; object-fit: cover;">
                </div>
            </div>

            <!-- Tocha Olímpica -->
            <div class="zig-zag-row reverse" id="tochaOlimpica" style="margin-bottom: 0;">
                <div class="zig-text">
                    <span class="tag-highlight" style="background: var(--color-black); color: var(--color-yellow); margin-bottom: 15px;">Esporte & Inclusão</span>
                    <h3 style="font-size: 2.5rem;">A Tocha Olímpica</h3>
                    <p class="subtitle" style="font-size: 1.1rem;">Jogos Olímpicos Rio 2016</p>
                    <p>O reconhecimento do nosso impacto social ultrapassou as barreiras da arte e chegou ao maior evento esportivo do planeta.</p>
                    <p>Fomos escolhidos para conduzir a Tocha Olímpica durante o revezamento oficial dos Jogos Rio 2016. Um marco histórico que representou não apenas o nosso instituto, mas a força, a cultura e a resistência de toda a comunidade negra e da diversidade brasileira.</p>
                </div>
                <div class="zig-img">
                    <img src="{{ asset('imgs/Conduzindo a Tocha2.jpeg') }}" alt="Conduzindo a Tocha Olímpica Rio 2016" class="img-frame" style="max-height: 450px; width: 100%; object-fit: cover; object-position: top;">
                </div>
            </div>

        </div>
    </section>

    <!-- CELEBRIDADES E PERSONALIDADES -->
    <section class="section bg-offwhite">
        <div class="container">
            <h2 class="section-title center">Personalidades que Apoiam</h2>
            <p class="center" style="max-width: 600px; margin: 0 auto 50px; color: #666;">De jornalistas consagradas a vencedoras do Prêmio Nobel: o impacto das nossas bonecas alcança corações em todo o mundo.</p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 30px;">
                <!-- Celeb 1 -->
                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-sm); text-align: center; padding-bottom: 20px;">
                    <img src="{{ asset('imgs/Gloria Maria com a marca Preta Pretinha.png') }}" alt="Glória Maria" style="width: 100%; height: 250px; object-fit: cover; margin-bottom: 15px;">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0;">Glória Maria</h3>
                </div>
                <!-- Celeb 2 -->
                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-sm); text-align: center; padding-bottom: 20px;">
                    <img src="{{ asset('imgs/FatimaComPretaPretinha.jpeg') }}" alt="Fátima Bernardes" style="width: 100%; height: 250px; object-fit: cover; margin-bottom: 15px;">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0;">Fátima Bernardes</h3>
                </div>
                <!-- Celeb 3 -->
                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-sm); text-align: center; padding-bottom: 20px;">
                    <img src="{{ asset('imgs/FotoComMalala.jpeg') }}" alt="Malala Yousafzai" style="width: 100%; height: 250px; object-fit: cover; margin-bottom: 15px;">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0;">Malala Yousafzai</h3>
                </div>
                <!-- Celeb 4 (Substituído Javier Bardem por Lázaro Ramos para evitar repetição) -->
                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-sm); text-align: center; padding-bottom: 20px;">
                    <img src="{{ asset('imgs/lazaroramos.webp') }}" alt="Lázaro Ramos" style="width: 100%; height: 250px; object-fit: cover; margin-bottom: 15px; object-position: top;">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0;">Lázaro Ramos</h3>
                </div>
                <!-- Celeb 5 -->
                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-sm); text-align: center; padding-bottom: 20px;">
                    <img src="{{ asset('imgs/Atriz global Alessandra Negrini.jpeg') }}" alt="Alessandra Negrini" style="width: 100%; height: 250px; object-fit: cover; margin-bottom: 15px;">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0;">Alessandra Negrini</h3>
                </div>
                <!-- Celeb 6 -->
                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-sm); text-align: center; padding-bottom: 20px;">
                    <img src="{{ asset('imgs/FranciaMarquezComBonecaPretaPretinha.jpeg') }}" alt="Francia Márquez" style="width: 100%; height: 250px; object-fit: cover; margin-bottom: 15px;">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0;">Francia Márquez</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- NA IMPRENSA (REVISTAS) COM SWIPER 3D -->
    <section class="section bg-yellow-pale" style="overflow: hidden;">
        <div class="container">
            <h2 class="section-title center" id="areaRevista">Preta na Mídia</h2>
            <p class="center" style="max-width: 600px; margin: 0 auto 40px; color: #666;">Deslize para ver nossas publicações. Clique na capa para expandir e ler a matéria completa.</p>
            
            <div class="swiper magazine-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide magazine-card" onclick="openGalleryModal(this)">
                        <img src="{{ asset('imgs/capa-claudia01.png') }}" alt="Revista Claudia">
                        <div class="magazine-info">
                            <h4>Revista Claudia</h4>
                            <p>Bonequinhas Negras e Alto Faturamento</p>
                        </div>
                        <div class="hidden-description">
                            <h3>Revista Claudia (2004)</h3>
                            <img src="{{ asset('imgs/conteudo-claudia.jpg') }}" alt="Revista Claudia">
                            <p>Destaque para o empreendedorismo e a história de sucesso de Joyce Venâncio. Transformando o hobby de infância em um negócio de alto impacto.</p>
                        </div>
                    </div>

                    <div class="swiper-slide magazine-card" onclick="openGalleryModal(this)">
                        <img src="{{ asset('imgs/capa-raca-parlamentoNegro.png') }}" alt="Revista Raça">
                        <div class="magazine-info">
                            <h4>Revista Raça Brasil</h4>
                            <p>Negras Bonecas</p>
                        </div>
                        <div class="hidden-description">
                            <h3>Revista Raça Brasil</h3>
                            <p>A importância da representatividade infantil e o impacto social das bonecas na construção da autoestima de meninas e meninos negros.</p>
                        </div>
                    </div>

                    <div class="swiper-slide magazine-card" onclick="openGalleryModal(this)">
                        <img src="{{ asset('imgs/capa-folha.png') }}" alt="Revista da Folha">
                        <div class="magazine-info">
                            <h4>Revista da Folha</h4>
                            <p>Brinquedos que Ensinam</p>
                        </div>
                        <div class="hidden-description">
                            <h3>Revista da Folha (2008)</h3>
                            <p>As bonecas do Instituto sendo reconhecidas como ferramentas essenciais de educação e aprendizado para o domingo em família.</p>
                        </div>
                    </div>

                    <div class="swiper-slide magazine-card" onclick="openGalleryModal(this)">
                        <img src="{{ asset('imgs/capa-lojas.png') }}" alt="Lojas & Lojistas">
                        <div class="magazine-info">
                            <h4>Lojas & Lojistas</h4>
                            <p>Aqui Todo Mundo Tem Vez</p>
                        </div>
                        <div class="hidden-description">
                            <h3>Revista Lojas & Lojistas (2011)</h3>
                            <p>Como um pequeno ateliê na Vila Madalena se transformou em uma sólida instituição de inclusão social reconhecida pelo Sindilojas-SP.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- REAPROVEITANDO O MODAL DA GALERIA -->
    <div id="lightbox-modal" class="lightbox-modal">
        <div class="modal-content-wrapper">
            <span class="close-modal" onclick="closeGalleryModal()">&times;</span>
            <div class="modal-body-grid">
                <div class="modal-image-col">
                    <img id="modal-img" src="" alt="">
                </div>
                <div class="modal-text-col">
                    <div id="modal-desc-content"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHAMADA PARA O INSTAGRAM -->
    <section class="section bg-light" style="padding-bottom: 80px;">
        <div class="container">
            <div class="instagram-banner" style="background: var(--color-yellow); border-radius: 20px; padding: 50px; display: flex; align-items: center; justify-content: space-between; gap: 50px; box-shadow: var(--shadow-md); flex-wrap: wrap;">
                
                <div class="insta-text" style="flex: 1; min-width: 300px;">
                    <h2 style="font-size: 2.8rem; color: var(--color-black); margin-bottom: 15px; font-family: var(--font-head);">
                        Acompanhe nosso dia a dia! <i class="bi bi-instagram"></i>
                    </h2>
                    <p style="font-size: 1.1rem; color: var(--color-black); margin-bottom: 30px; max-width: 500px;">
                        A transformação social não para! Siga o Instituto Preta Pretinha no Instagram para conferir os bastidores das nossas oficinas, lançamentos de bonecas e nossa agenda de eventos em tempo real.
                    </p>
                    <a href="https://www.instagram.com/institutopretapretinha?igsh=NjhuNW83ZjFjMjJu" target="_blank" rel="noopener noreferrer" class="btn-primary" style="background: var(--color-black); color: var(--color-yellow); font-size: 1.1rem; padding: 15px 35px; display: inline-flex; align-items: center; gap: 10px; text-decoration: none;">
                        <i class="bi bi-instagram" style="font-size: 1.3rem;"></i> Seguir @institutopretapretinha
                    </a>
                </div>

                <div class="insta-image" style="flex: 0 0 300px; text-align: center; margin: 0 auto;">
                    <!-- Efeito de hover direto no HTML para dar interatividade -->
                    <img src="{{ asset('imgs/print-Instagram.jpeg') }}" alt="Instagram Instituto Preta Pretinha" 
                         style="width: 100%; max-width: 260px; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.3); border: 5px solid var(--color-black); transform: rotate(4deg); transition: transform 0.4s ease;" 
                         onmouseover="this.style.transform='rotate(0deg) scale(1.05)'" 
                         onmouseout="this.style.transform='rotate(4deg) scale(1)'">
                </div>

            </div>
        </div>
    </section>

    <!-- SCRIPT DO SWIPER E DO MODAL -->
    <script>
        window.addEventListener('load', function() {
            if (typeof Swiper !== 'undefined') {
                const swiper = new Swiper('.magazine-swiper', {
                    effect: 'coverflow',
                    grabCursor: true,
                    centeredSlides: true,
                    slidesPerView: 'auto',
                    loop: false,
                    coverflowEffect: {
                        rotate: 20, 
                        stretch: 0,
                        depth: 250, 
                        modifier: 1,
                        slideShadows: true,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    }
                });
            } else {
                console.error("A biblioteca do Swiper ainda não carregou.");
            }
        });

        function openGalleryModal(element) {
            const imgSrc = element.querySelector('img').src;
            const contentHtml = element.querySelector('.hidden-description').innerHTML;
            
            document.getElementById('modal-img').src = imgSrc;
            document.getElementById('modal-desc-content').innerHTML = contentHtml;
            
            const modal = document.getElementById('lightbox-modal');
            modal.style.display = 'flex';
            setTimeout(() => modal.classList.add('show'), 10);
            document.body.style.overflow = 'hidden'; 
        }

        function closeGalleryModal() {
            const modal = document.getElementById('lightbox-modal');
            modal.classList.remove('show');
            setTimeout(() => modal.style.display = 'none', 300);
            document.body.style.overflow = 'auto'; 
        }

        window.onclick = function(event) {
            const modal = document.getElementById('lightbox-modal');
            if (event.target == modal) {
                closeGalleryModal();
            }
        }
    </script>
@endsection