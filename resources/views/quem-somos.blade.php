@extends('layouts.main')

@section('title', 'Quem Somos | Instituto Preta Pretinha')

@section('content')
    <!-- HERO SECTION QUEM SOMOS -->
    <section class="page-hero bg-yellow">
        <div class="container center">
            <h1 class="fade-in">Nossa Essência</h1>
            <p class="fade-in delay-1">Ancestralidade, memória e impacto social.</p>
        </div>
    </section>

    <!-- NOSSA HISTÓRIA -->
    <section class="section">
        <div class="container grid-2 align-top" style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
            <div class="text-content fade-in">
                <h2 class="section-title">Nossa História</h2>
                <p>O <strong>Instituto Preta Pretinha</strong> é uma organização de impacto social, sediada no bairro de Vila Madalena, na cidade de São Paulo.</p>
                <p>Criado pelas irmãs Venâncio, a Preta Pretinha notabiliza-se pela ancestralidade e memória familiar gerada nas irmãs por sua avó Maria Francisca, em meio a arte da confecção de bonecas negras — um ato amoroso de construção de identidade e representatividade.</p>
                <p>A Preta Pretinha produz bonecas artesanais: negras, asiáticas, indígenas, muçulmanas, cadeirantes, entre tantas outras, e causa importante mobilização social ao dar visibilidade à diversidade humana a partir de suas criações, firmando assim um compromisso com a sociedade, a diversidade e com a construção de relações humanas dignas.</p>
            </div>
            <div class="image-content fade-in delay-1">
                <div class="photo-frame straight">
                    <img src="{{ asset('imgs/foto-irmas-venancio.jpg') }}" alt="As três irmãs Venâncio juntas no atelier com bonecas" class="img-cover">
                    <span class="caption">Joyce, Lúcia e Cristina Venâncio</span>
                </div>
            </div>
        </div>
    </section>

    <!-- MISSÃO, VISÃO E OBJETIVO -->
    <section class="section bg-light">
        <div class="container">
            <div class="values-grid">
                <div class="value-card">
                    <i class="bi bi-heart-pulse-fill icon-value"></i>
                    <h3>Missão</h3>
                    <p>Honrar a dignidade humana em toda a sua diversidade.</p>
                </div>
                <div class="value-card">
                    <i class="bi bi-eye-fill icon-value"></i>
                    <h3>Visão</h3>
                    <p>Ser a principal organização de impacto social para a dignidade e a diversidade humana.</p>
                </div>
                <div class="value-card">
                    <i class="bi bi-bullseye icon-value"></i>
                    <h3>Objetivo</h3>
                    <p>Atuar como referência social de representatividade a partir da manualidade, cultura e expressão humana.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PONTO DE CULTURA -->
    <section class="section">
        <div class="container small-container center">
            <span class="badge-pill">Certificação</span>
            <h2>Ponto de Cultura</h2>
            <p>O Instituto é também Ponto de Cultura, certificado pelo Ministério da Cultura e Diversidade, premiado e classificado em primeiro lugar.</p>
            <p>Desenvolvemos projetos na rede de ensino e saúde pública, comunidades, instituições do terceiro setor e empresas, centros culturais, entre outros. Tudo a partir de uma metodologia de pertencimento e valorização do indivíduo independentemente da etnia, credo, orientação sexual, nacionalidade ou deficiência. Afinal, <strong>vida é diversidade</strong>.</p>
            
            <div class="box-activities mt-2">
                <h3 class="center"><i class="bi bi-gear-fill"></i> Nossas Ações</h3>
                <p style="text-align: left;">Atuamos com:</p>
                <ul class="check-list">
                    <li>Palestras de sensibilização (personalizadas);</li>
                    <li>Rodas de conversa;</li>
                    <li>Oficinas de produção para geração de renda;</li>
                    <li>Intervenções culturais intergeracionais (idosos, adultos, jovens e crianças).</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- NOSSAS EXPOSIÇÕES -->
    <section class="section bg-yellow-pale">
        <div class="container">
            <h2 class="section-title center mb-large">Nossas Exposições</h2>

            <div class="zig-zag-row">
                <div class="zig-text">
                    <h3>Diversidade para um mundo melhor</h3>
                    <p class="subtitle">Desde 2007</p>
                    <p>Esta exposição tem como objetivo apresentar bonecos artesanais que representam a diversidade humana e inclusão social. O acervo utiliza como base pesquisas profundas com profissionais de diversas áreas envolvidas com a causa.</p>
                </div>
                <div class="zig-img">
                    <img src="{{ asset('imgs/producaoBonecas.JPG') }}" alt="Coleção diversa de bonecas artesanais incluindo cadeirantes e deficientes visuais" class="img-frame">
                </div>
            </div>

            <div class="zig-zag-row reverse">
                <div class="zig-text">
                    <h3>Meu cabelo é bom</h3>
                    <p>Uma amostra de 33 bonecos de pano 100% artesanais, que têm em comum o fato de serem negros, mas com a diversidade e beleza dos cabelos como destaque.</p>
                    <p>A essência da exposição é apresentar a beleza do cabelo crespo e os penteados Afro como questão de identidade, cultura e resistência, permitindo que o público se reconheça nos modelos apresentados.</p>
                </div>
                <div class="zig-img">
                    <img src="{{ asset('imgs/MeuCabeloEBom.jpg') }}" alt="Exposição de bonecas" class="img-frame">
                </div>
            </div>

        </div>
    </section>

    <!-- OFICINA -->
    <section class="section">
        <div class="container center">
            <div class="highlight-box">
                <h2>Oficina "Cadeira na Calçada"</h2>
                <p>Um projeto especial que tem por finalidade unir pessoas e resgatar a era da "boa vizinhança".</p>
                <p>Criamos intervenções intergeracionais, impulsionando trocas de experiências, entretenimento e a integração entre os moradores com muitas atividades e risos!</p>
                <a href="/contato" class="btn-primary mt-2">Leve este projeto para seu bairro</a>
            </div>
        </div>
    </section>
@endsection