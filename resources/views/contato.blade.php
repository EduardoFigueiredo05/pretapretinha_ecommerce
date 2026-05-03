@extends('layouts.main')

@section('title', 'Contato | Preta Pretinha')

@section('content')
    <section class="contact-split-section">
        <div class="container contact-wrapper">
            
            <div class="contact-info-col fade-in">
                <h1>Vamos <span class="text-underline">conversar?</span></h1>
                <p class="contact-desc">Quer saber mais sobre nossas bonecas, agendar uma palestra ou falar sobre parcerias? Entre em contato conosco.</p>
                
                <div class="contact-details">
                    <div class="detail-item">
                        <label>E-mail</label>
                        <a href="mailto:contato@pretapretinha.com.br" class="detail-link">contato@pretapretinha.com.br</a>
                    </div>
                    <div class="detail-item">
                        <label>WhatsApp</label>
                        <a href="#" class="detail-link">(11) 99999-9999</a>
                    </div>
                    <div class="detail-item">
                        <label>Visite nosso Ponto de Cultura</label>
                        <span class="detail-link" style="border: none;">Rua Clelia, 1863 - Lapa, São Paulo - SP</span>
                    </div>
                </div>
            </div>

            <div class="contact-form-col fade-in delay-1">
                <div class="modern-form-card">
                    <form action="#" method="POST">
                        <!-- O @csrf é obrigatório no Laravel em formulários futuros para segurança -->
                        @csrf
                        
                        <div class="input-row">
                            <div class="input-group">
                                <label for="nome">Nome completo</label>
                                <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
                            </div>
                            <div class="input-group">
                                <label for="telefone">Telefone</label>
                                <input type="tel" id="telefone" name="telefone" placeholder="(11) 90000-0000">
                            </div>
                        </div>

                        <div class="input-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                        </div>

                        <div class="input-group">
                            <label for="mensagem">Mensagem</label>
                            <textarea id="mensagem" name="mensagem" rows="4" placeholder="Como podemos ajudar?" required></textarea>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn-submit-black">
                                Enviar mensagem <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection