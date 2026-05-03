@extends('layouts.main')

@section('title', 'Acervo Histórico | Preta Pretinha')

@section('content')
    <!-- HERO ESTILO MUSEU -->
    <section class="museum-hero" style="background-image: linear-gradient(rgba(17, 17, 17, 0.7), rgba(17, 17, 17, 0.7)), url('{{ asset('imgs/carnaval.jpeg') }}');">
        <div class="container center fade-in">
            <span class="tagline" style="background: transparent; color: var(--color-yellow); border: 1px solid var(--color-yellow);">Acervo Permanente</span>
            <h1 style="color: white; font-size: 4rem; margin-top: 15px;">A História em Movimento</h1>
            <p style="color: #ddd; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Nossa trajetória contada através de sorrisos, oficinas e muita representatividade ao longo de mais de duas décadas.</p>
        </div>
    </section>

    <!-- ALAS DA EXPOSIÇÃO -->
    <section class="section bg-offwhite" style="padding-bottom: 40px;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px; border-bottom: 2px solid #ddd; padding-bottom: 50px;">
                <div>
                    <h3 style="border-bottom: 2px solid var(--color-black); padding-bottom: 10px; display: flex; justify-content: space-between; font-family: var(--font-body); font-weight: 700;">Oficinas & Escolas <i class="bi bi-arrow-right"></i></h3>
                    <p style="font-size: 0.95rem; color: #666; margin-top: 15px;">Ações educativas levando diversidade e conscientização para as salas de aula e quadras esportivas de todo o Brasil.</p>
                </div>
                <div>
                    <h3 style="border-bottom: 2px solid var(--color-black); padding-bottom: 10px; display: flex; justify-content: space-between; font-family: var(--font-body); font-weight: 700;">Cultura & Exposições <i class="bi bi-arrow-right"></i></h3>
                    <p style="font-size: 0.95rem; color: #666; margin-top: 15px;">Participações em eventos culturais, exposições abertas e resgate da ancestralidade através da arte manual.</p>
                </div>
                <div>
                    <h3 style="border-bottom: 2px solid var(--color-black); padding-bottom: 10px; display: flex; justify-content: space-between; font-family: var(--font-body); font-weight: 700;">Reconhecimento <i class="bi bi-arrow-right"></i></h3>
                    <p style="font-size: 0.95rem; color: #666; margin-top: 15px;">O impacto do nosso Ponto de Cultura validado por instituições, palestras e premiações em território nacional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- GRID DAS OBRAS -->
    <section class="section bg-offwhite" style="padding-top: 10px;">
        <div class="container">
            <div class="museum-grid">
                
                <!-- OBRA 1 -->
                <div class="museum-card" onclick="openGalleryModal(this)">
                    <div class="img-wrapper">
                        <img src="{{ asset('imgs/escola zilda.jpeg') }}" alt="Escola Zilda">
                    </div>
                    <div class="museum-info">
                        <h4>Ação na Escola Zilda</h4>
                        <span>Oficinas Educativas</span>
                    </div>
                    <div class="hidden-description">
                        <h3>Ação na Escola Zilda</h3>
                        <p>Levando diversidade e sorrisos para os alunos através de atividades lúdicas. O contato direto com as crianças nos permite plantar a semente da igualdade desde cedo.</p>
                    </div>
                </div>

                <!-- OBRA 2 -->
                <div class="museum-card" onclick="openGalleryModal(this)">
                    <div class="img-wrapper">
                        <img src="{{ asset('imgs/CAPIVARI ESCOLA 4.png') }}" alt="Capivari">
                    </div>
                    <div class="museum-info">
                        <h4>Visita em Capivari</h4>
                        <span>Apresentação Escolar</span>
                    </div>
                    <div class="hidden-description">
                        <h3>Visita em Capivari</h3>
                        <p>Apresentação das coleções inclusivas para a rede de ensino. Um dia marcado por descobertas e pela alegria de se ver representado nos brinquedos.</p>
                    </div>
                </div>

                <!-- OBRA 3 -->
                <div class="museum-card" onclick="openGalleryModal(this)">
                    <div class="img-wrapper">
                        <img src="{{ asset('imgs/Vanderlei cordeiro.jpeg') }}" alt="Vanderlei Cordeiro">
                    </div>
                    <div class="museum-info">
                        <h4>Encontro no Esporte</h4>
                        <span>Inclusão e Atividade Física</span>
                    </div>
                    <div class="hidden-description">
                        <h3>Encontro no Esporte</h3>
                        <p>Ação que une a representatividade das nossas bonecas com o incentivo à prática esportiva, mostrando que a diversidade está em todos os pódios.</p>
                    </div>
                </div>

                <!-- OBRA 4 -->
                <div class="museum-card" onclick="openGalleryModal(this)">
                    <div class="img-wrapper">
                        <img src="{{ asset('imgs/craco abayomi.jpeg') }}" alt="Oficina Abayomi">
                    </div>
                    <div class="museum-info">
                        <h4>Oficina Abayomi</h4>
                        <span>Cultura e Resistência</span>
                    </div>
                    <div class="hidden-description">
                        <h3>Oficina Abayomi</h3>
                        <p>Resgate da ancestralidade através da confecção de bonecas Abayomi. Cada nó conta uma história de força, afeto e resistência da cultura negra.</p>
                    </div>
                </div>

                <!-- OBRA 5 -->
                <div class="museum-card" onclick="openGalleryModal(this)">
                    <div class="img-wrapper">
                        <img src="{{ asset('imgs/Theodosina_1.jpg') }}" alt="Theodosina">
                    </div>
                    <div class="museum-info">
                        <h4>Dona Theodosina</h4>
                        <span>Memória Institucional</span>
                    </div>
                    <div class="hidden-description">
                        <h3>Dona Theodosina</h3>
                        <p>Uma de nossas grandes inspirações e matriarcas da cultura. Homenagear quem veio antes é o pilar que sustenta o nosso trabalho hoje.</p>
                    </div>
                </div>

                <!-- OBRA 6 -->
                <div class="museum-card" onclick="openGalleryModal(this)">
                    <div class="img-wrapper">
                        <img src="{{ asset('imgs/SEAS.jpeg') }}" alt="Sebrae Salvador">
                    </div>
                    <div class="museum-info">
                        <h4>Palestra Sebrae Salvador</h4>
                        <span>Empreendedorismo Negro</span>
                    </div>
                    <div class="hidden-description">
                        <h3>Palestra Sebrae Salvador</h3>
                        <p>Compartilhando a nossa trajetória de sucesso e desafios no painel "Mulher, Negra e Empreendedora". Inspirando novos negócios com propósito.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- MODAL DO LIGHTBOX -->
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

    <!-- SCRIPT DO MODAL INTEGRADO -->
    <script>
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